jQuery(function($){
    var url ="https://spreadsheets.google.com/feeds/list/1zz37OXW_T5yxAhqpEoI3D0Kyqjj2YtNW5glKYBcCUzE/od6/public/values?alt=json"
$.getJSON(url, function(data) {
//first row "title" column
var entries = data.feed.entry
var supportedDistros = ["Ubuntu", "Fedora","CentOS","Linux Mint","openSUSE"]
$.each(entries, function(index,entry) {
$.each(supportedDistros, function(ind, distro)
{
        var dist = entry.gsx$distribution.$t
if(distro.toUpperCase() == dist.toUpperCase()){
$('span.'+distro.replace(/\s+/g, '-').toLowerCase()+'-version').replaceWith(entry.gsx$currentstableversion.$t);
               }

})
})
});
});

