$('#excerpt-long b').text(function(_, txt) {
  return txt.length > 17 ? txt.substr(0, 17) + "..." : txt;
});
