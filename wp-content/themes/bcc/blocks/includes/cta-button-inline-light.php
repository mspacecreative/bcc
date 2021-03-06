<?php
if ( have_rows('cta_links') ):
	while ( have_rows('cta_links') ): the_row();	
		
	if ( have_rows('cta_link') ):
	while ( have_rows('cta_link') ): the_row();
		$linklabel = get_sub_field('label');
		$exturl = get_sub_field('url');
		$pagelink = get_sub_field('page');
		$pdf = get_sub_field('pdf');
		$linktype = get_sub_field('link_type');
								
		if ( $linktype == 'internal' ) {
			echo '<p class="inline-links"><a class="button light" href="' . $pagelink . '">' . $linklabel . '</a></p>';
		} elseif ( $linktype == 'external' ) {
			echo '<p class="inline-links"><a class="button light" href="' . $exturl . '" target="_blank">' . $linklabel . '</a></p>';
		} elseif ( $linktype == 'pdf' ) {
			echo '<p class="inline-links"><a class="pdf_dl light" href="' . $pdf . '" target="_blank">' . $linklabel . '</a></p>';
		}
				
	endwhile;
	endif;
	
	endwhile;
endif;