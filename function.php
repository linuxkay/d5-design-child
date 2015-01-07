<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() { 
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) ); 
}

function load_distro_version_info(){
	async_load_distro_info()

}

add_action('wp-head', 'load_distro_verion_info');
function async_load_distro_info() {
   $url = "https://spreadsheets.google.com/feeds/list/1zz37OXW_T5yxAhqpEoI3D0Kyqjj2YtNW5glKYBcCUzE/od6/public/values?alt=json";
echo '
<script type="text/javascript">
$.getJSON($url, function(data) {
//first row "title" column
var entries = data.feed.entry
var supportedDistros = ["Ubuntu", "Fedora","CentOS"]
$.each(entries, function(index,entry) {
$.each(supportedDistros, function(ind, distro) {
if(distro == entry.gsx$distribution.$t){
console.log(entry.gsx$distribution.$t + " --- "+entry.gsx$currentstableversion.$t)
}
})
})
});
</script>';
}
