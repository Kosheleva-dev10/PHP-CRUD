<?php

function showAccordion($title,$id,$content)
{
	echo "<div class='panel panel-default'>
				<div class='panel-heading'>
							<h4 class='panel-title'>
								<a data-toggle='collapse' data-parent='#accordion' href='#$id' class='collapsed'>
									$title
								</a>
							</h4>
				</div>
										
				<div id='$id' class='panel-collapse collapse'>
						<div class='panel-body' style='text-align:justify;'>
							$content
						</div>
				</div>
		</div>";
}
?>