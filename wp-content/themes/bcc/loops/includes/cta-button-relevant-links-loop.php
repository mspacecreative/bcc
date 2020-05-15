<?php
if ( have_rows('cta_links') ):
	while ( have_rows('cta_links') ): the_row();
	
	$linklabel = get_sub_field('link_label', $post->ID);
	$exturl = get_sub_field('link_url', $post->ID);
	$pagelink = get_sub_field('page_link', $post->ID);
	$pdf = get_sub_field('upload_pdf', $post->ID);
	$linktype = get_sub_field('link_type', $post->ID); 
							
	if ( $linktype == 'internal' ) {
		echo '<p><a class="button" href="' . $pagelink . '">' . $linklabel . '</a></p>';
	} elseif ( $linktype == 'external' ) {
		echo '<p><a class="button" href="' . $exturl . '" target="_blank">' . $linklabel . '</a></p>';
	} elseif ( $linktype == 'pdf' ) {
		echo '<p><a class="pdf_dl" href="' . $pdf . '" target="_blank">' . $linklabel . '</a></p>';
	}
	
	endwhile;
endif;