<?php
$linklabel = get_field('lin_label', $post->ID);
$exturl = get_field('link_url', $post->ID);
$pagelink = get_field('page_link', $post->ID);
$pdf = get_field('upload_pdf', $post->ID);
$linktype = get_field('link_type', $post->ID); 
						
if ( $linktype == 'internal' ) {
	echo '<p><a class="button" href="' . $pagelink . '">' . $linklabel . '</a></p>';
} elseif ( $linktype == 'external' ) {
	echo '<p><a class="button" href="' . $exturl . '" target="_blank">' . $linklabel . '</a></p>';
} elseif ( $linktype == 'pdf' ) {
	echo '<p><a class="button" href="' . $pdf . '" target="_blank">' . $linklabel . '</a></p>';
}