<?php
// XML detail template
// output the buffer
ob_start();
echo '<record>'."\n";
echo '<title>{title}</title>'."\n";
echo '<edition>{edition}</edition>'."\n";
echo '<classification>{classification}</classification>'."\n";
echo '<call_number>{call_number}</call_number>'."\n";
echo '<isbn_issn>{isbn_issn}</isbn_issn>'."\n";
echo '<authors>{authors}</authors>'."\n";
echo '<subjects>{subjects}</subjects>'."\n";
echo '<series>{series_title}</series>'."\n";
echo '<medium>{gmd_name}</medium>'."\n";
echo '<collection_type>{coll_type_name}</collection_type>'."\n";
echo '<language>{language_name}</language>'."\n";
echo '<publisher>{publisher_name}</publisher>'."\n";
echo '<publish_year>{publish_year}</publish_year>'."\n";
echo '<publish_place>{publish_place}</publish_place>'."\n";
echo '<collation>{collation}</collation>'."\n";
echo '<abstract_notes>{notes}</abstract_notes>'."\n";
echo '<item_location>{location}</item_location>'."\n";
echo '</record>'."\n";
// put the buffer to template var
$detail_template = ob_get_clean();
?>
