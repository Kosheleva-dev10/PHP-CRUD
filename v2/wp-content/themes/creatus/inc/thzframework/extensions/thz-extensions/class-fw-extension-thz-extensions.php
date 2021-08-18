<?php

if (! defined('FW')) { die('Forbidden'); }

class FW_Extension_Thz_Extensions extends FW_Extension {

	public function _init() {
		add_filter(
			'fw:ext:page-builder:json-structure-needs-correction',
			array($this, '_filter_needs_correction'), 10, 2
		);

		add_filter(
			'fw:ext:page-builder:json-structure-correction',
			array($this, '_action_inner_column_corrector'), 10, 2
		);
		
		add_filter(
			'fw:ext:wp-shortcodes:default-shortcodes',
			array($this, '_filter_remove_from_editor_shortcodes')
		);
	}

	public function _filter_needs_correction($needs_correction, $items) {
		if( array_key_exists('innercolumn', $items) ) {
			return true;
		} else {
			return false;
		}
	}

	public function _action_inner_column_corrector($items_to_correct, $items_before_any_correction) {
		$this->items_corrector($items_to_correct);
		return $items_to_correct;
	}

	public function _filter_remove_from_editor_shortcodes($existing) {
		return array_diff(
			$existing, 
			array('innerrow', 'innercolumn', 'sections_slider')
		);
	}
	
	private function items_corrector(& $items_to_correct) {
		foreach( $items_to_correct as $key => & $data ) {
			if( 'column' === fw_akg('type', $data) ) {
				if( $this->have_innercolumn( $data['_items'] ) ) {
					$data['_items'] = $this->structure_reorganization( $data['_items'] );
				}
			}

			if( isset( $data['_items'] ) ) {
				$this->items_corrector(
					$data['_items']
				);
			}
		}
	}

	private function inline_sum($initial, $future_size) {
		list($first, $second) = explode('_', $future_size);

		if( '1' === $first ) {
			$result = (12 / (int)$second);
		} else {
			$result = (12 / (int)$second) * (int)$first;
		}

		return $initial + $result;
	}

	private function structure_reorganization( $items ) {
		$structure = array();

		$row_step = 0;
		$item_step = 0;
		$inner_sum = 0;

		foreach( $items as $key => $data ) {
			$type = fw_akg('type', $data);

			if( 'innercolumn' === $type ) {
				$structure[$row_step]['type'] = 'innerrow';
				$structure[$row_step]['_items'][] = $data;
				$inner_sum = $this->inline_sum($inner_sum, $data['width']);

				if('center' === fw_akg('atts/centered', $data)){
					$inner_sum =  12;
				}
				
				// Check the next item type.
				$next_step = $item_step + 1;
				if( isset( $items[ $next_step ] ) ) {
					if( 'innercolumn' !== $items[ $next_step ]['type'] ) {
						$row_step += 1;
					} else {
						$width = $items[ $next_step ]['width'];
						$total = $this->inline_sum($inner_sum, $width);

						if( $total > 12 ) {
							$row_step += 1;
							$inner_sum = 0;
						}
					}
				}
				
			} else {
				$structure[$row_step]['type'] = 'innerrow';
				$structure[$row_step]['_items'][] = $this->innercolumn_structure(
					$data
				);

				$inner_sum = 0;
				$row_step += 1;
			}

			$item_step += 1;
		}

		return $structure;
	}

	private function innercolumn_structure( $items ) {
		$column = fw_ext('shortcodes')->get_shortcode('innercolumn');

		return array(
			'type' => 'innercolumn',
			'width' => '1_1',
			'atts' => fw_get_options_values_from_input($column->get_options()),
			'_items' => array(
				$items
			),
		);
	}

	private function have_innercolumn($struture) {
		$response = false;
		foreach( $struture as $key => $data ) {
			$type = fw_akg('type', $data);
			if( 'innercolumn' === $type ) {
				$response = true;
			}
		}

		return $response;
	}
}

