<?php
/**
 * FooGallery Bootstrapped Gallery gallery template
 * This is the template that is run when a FooGallery shortcode is rendered to the frontend
 */
//the current FooGallery that is currently being rendered to the frontend
global $current_foogallery;
//the current shortcode args
global $current_foogallery_arguments;

$settings            = $current_foogallery->settings;
$cell_classes        = $settings['bootstrapped-gallery_cell-classes'];
$figure_classes      = $settings['bootstrapped-gallery_figure-classes'];
$img_classes         = $settings['bootstrapped-gallery_img-classes'];
$heading_classes     = $settings['bootstrapped-gallery_heading-classes'];
$subheading_classes  = $settings['bootstrapped-gallery_subheading-classes'];
$description_classes = $settings['bootstrapped-gallery_description-classes'];

$layouts = array(
	'd12',
	'd3 i6 d3',
	'd2 i4 i4 d2',
	'i4 i4 i4',
	'i3 i3 i3 i3',
	'i4 i4 i4 / d2 i4 i4 d2',
	'i4 i4 i4 / i4 i4 i4',
	'i4 i4 i4 / i4 i4 i4 / d4 i4 d4',
	'i3 i3 i3 i3 / i3 i3 i3 i3',
	'i4 i4 i4 / i4 i4 i4 / i4 i4 i4',
	'i3 i3 i3 i3 / i3 i3 i3 i3 / d3 i3 i3 d3',
	'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / d2 i4 i4 d2',
	'i3 i3 i3 i3 / i3 i3 i3 i3 / i3 i3 i3 i3',
	'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / d4 i4 d4',
	'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / d2 i4 i4 d2',
	'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4',
	'i3 i3 i3 i3 / i3 i3 i3 i3 / i3 i3 i3 i3 / i3 i3 i3 i3'
);
if ($settings['bootstrapped-gallery_density'] == 'more') {
	$layouts = array(
		'd12',
		'd4 i4 d4',
		'd2 i4 i4 d2',
		'i4 i4 i4',
		'i3 i3 i3 i3',
		'd1 i2 i2 i2 i2 i2 d1',
		'i2 i2 i2 i2 i2 i2',
		'i3 i3 i3 i3 / i3 i3 i3 d3',
		'i3 i3 i3 i3 / i3 i3 i3 i3',
		'i4 i4 i4 / i4 i4 i4 / i4 i4 i4',
		'd1 i2 i2 i2 i2 i2 d1 / d1 i2 i2 i2 i2 i2 d1',
		'i2 i2 i2 i2 i2 i2 / d1 i2 i2 i2 i2 i2 d1',
		'i2 i2 i2 i2 i2 i2 / i2 i2 i2 i2 i2 i2',
		'd2 i2 i2 i2 i2 d2 / d1 i2 i2 i2 i2 i2 d1 / d2 i2 i2 i2 i2 d2',
		'i3 i3 i3 i3 / i3 i3 i3 i3 / i3 i3 i3 i3 / i3 i3 d6',
		'd1 i2 i2 i2 i2 i2 d1 / d1 i2 i2 i2 i2 i2 d1 / d1 i2 i2 i2 i2 i2 d1',
		'i3 i3 i3 i3 / i3 i3 i3 i3 / i3 i3 i3 i3 / i3 i3 i3 i3'
	);
}
elseif ($settings['bootstrapped-gallery_density'] == 'fewer') {
	$layouts = array(
		'd12',
		'd2 i8 d2',
		'i6 i6',
		'i4 i4 i4',
		'i6 i6 / i6 i6',
		'i4 i4 i4 / d2 i4 i4 d2',
		'i4 i4 i4 / i4 i4 i4',
		'i4 i4 i4 / i4 i4 i4 / d4 i4 d4',
		'i6 i6 / i6 i6 / i6 i6 / i6 i6',
		'i4 i4 i4 / i4 i4 i4 / i4 i4 i4',
		'i6 i6 / i6 i6 / i6 i6 / i6 i6 / i6 i6',
		'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / d2 i4 i4 d2',
		'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4',
		'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / d4 i4 d4',
		'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / d2 i4 i4 d2',
		'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4',
		'i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / i4 i4 i4 / d4 i4 d4',
	);
}

$warning = false;
$images = $current_foogallery->attachments();
if (count($images) > 16) {
	$images = array_slice($images, 0, 16);
	$warning = true;
}
$layout = explode(' ', $layouts[count($images)]);

require_once 'lib_autolink.php';

?>

<div id="foogallery-gallery-<?php echo $current_foogallery->ID; ?>" class="foogallery-gallery-bootstrapped">
<div class="row">
<?php
	while (count($layout)) {
		$cell = array_shift($layout);
		$celltype = substr($cell, 0, 1);
		$cellsize = substr($cell, 1);
		
		if ($celltype == 'd') {
			echo "\t<div class=\"col-md-${cellsize}\"></div>\n";
		}
		
		elseif ($celltype == 'i') {
			$image = array_shift($images);
			$startlink = '';
			$endlink   = '';
			if ($image->custom_url) {
				$startlink = sprintf("<a href=\"%s\">", htmlspecialchars($image->custom_url));
				$endlink   = '</a>';
			}
						
			print "\t<section class=\"col-md-${cellsize} ${cell_classes}\">\n";
			print "\t\t<figure class=\"${figure_classes}\">\n";
			printf("\t\t\t%s<img class=\"${img_classes}\" src=\"%s\" alt=\"%s\" title=\"%s\">%s\n", $startlink, htmlspecialchars($image->url), htmlspecialchars($image->alt), htmlspecialchars($image->title), $endlink);
			printf("\t\t\t<h1 class=\"${heading_classes}\">%s%s%s</h1>\n", $startlink, str_replace('  ','<br>', htmlspecialchars($image->title)), $endlink);
			if (strlen($image->caption)) {
				printf("\t\t\t<h2 class=\"${subheading_classes}\">%s</h2>\n", str_replace('  ','<br>', htmlspecialchars($image->caption)));
			}
			if (strlen($image->description)) {
  			printf("\t\t\t<p class=\"${description_classes}\">%s</p>\n", autolink_email(autolink(str_replace("\n\n", "</p><p>", htmlspecialchars($image->description)))));
			}
			print "\t\t</figure>\n";
			print "\t</section>\n";
		}
		
		elseif ($celltype == '/') {
			echo "</div>\n";
			echo "<div class=\"row\">\n";
		}
	}
?>
</div>
<?php if ($warning) { echo "<p>Gallery exceeds limit of 16 images.</p>\n"; } ?>
</div>