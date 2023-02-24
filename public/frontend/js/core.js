function goSearch(m) {
  //alert "test";
  var sbnumber = document.searchform.sbnumber.value;
  var compliance = document.searchform.compliance.value;
  var effectivity = document.searchform.effectivity.value;
  var desc = document.searchform.desc.value;
  var saring = document.searchform.saring.value;
  var tgl = document.searchform.tgl.value;
  var bln = document.searchform.bln.value;
  var thn = document.searchform.thn.value;
  var pg = m + ".php?sbnumber=" + sbnumber + "&compliance=" + compliance + "&effectivity=" + effectivity + "&desc=" + desc + "&tgl=" + tgl + "&bln=" + bln + "&thn=" + thn + "&saring=" + saring;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
function goSearchSB(m) {
  var actype = document.searchform.actype.value;
  var cat = document.searchform.cat.value;
  var e_categ = document.searchform.e_categ.value;
  var saring = document.searchform.saring.value;
  var s = document.searchform.s.value;
  var pg = m + ".php?actype=" + actype + "&e_categ=" + e_categ + "&cat=" + cat + "&s=" + s + "&saring=" + saring;
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
  });
  return false;
}
function goSearchSTraining(m) {
  //alert "test";
  var idcust = document.searchform.idcust.value;
  var idtrainingdet = document.searchform.idtrainingdet.value;
  var cat = document.searchform.cat.value;
  var saring = document.searchform.saring.value;
  var s = document.searchform.s.value;
  var pg = m + ".php?idcust=" + idcust + "&idtrainingdet=" + idtrainingdet + "&cat=" + cat + "&s=" + s + "&saring=" + saring;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
function goSearchSL(m) {
  //alert "test";
  var ac = document.searchform.ac.value;
  var cat = document.searchform.cat.value;
  var saring = document.searchform.saring.value;
  var s = document.searchform.s.value;
  var pg = m + ".php?ac=" + ac + "&cat=" + cat + "&s=" + s + "&saring=" + saring;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
function goSearchES(m) {
  //alert "test";
  var ac = document.searchform.ac.value;
  var cat = document.searchform.cat.value;
  var saring = document.searchform.saring.value;
  var s = document.searchform.s.value;
  var pg = m + ".php?ac=" + ac + "&cat=" + cat + "&s=" + s + "&saring=" + saring;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
function goSearchAM(m) {
  //alert "test";
  var ac = document.searchform.ac.value;
  var cat = document.searchform.cat.value;
  var saring = document.searchform.saring.value;
  var s = document.searchform.s.value;
  var pg = m + ".php?ac=" + ac + "&cat=" + cat + "&s=" + s + "&saring=" + saring;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
function goSearchCM(m) {
  //alert "test";
  //var ac=document.searchform.ac.value;
  var cat = document.searchform.cat.value;
  var saring = document.searchform.saring.value;
  var s = document.searchform.s.value;
  var pg = m + ".php?cat=" + cat + "&s=" + s + "&saring=" + saring;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
function goSearchStatusOrder(m) {
  //alert "test";
  var s = document.searchform.s.value;
  var saring = document.searchform.saring.value;
  var pg = m + ".php?s=" + s + "&saring=" + saring;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
function goSearchAdam(m) {
  //alert "test";
  var s = document.searchform.s.value;
  var idcust = document.searchform.idcust.value;
  var pg = m + "?s=" + s + "&idcust=" + idcust;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}

function goSearchTypeAC(m, idcust, typeac) {
  //alert (typeac);
  var pg = m + "?idcust=" + idcust + "&typeac=" + typeac;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
function goPage(pgrl, cpage) {
  //alert "test";
  //var cpage=document.searchform.cpage.value;
  var pg = pgrl + "&cpage=" + cpage;
  //alert (pg);
  //alert(pg);
  $().ajaxStart(function () {
    $('#loading').show();
  }).ajaxStop(function () {
    $('#loading').hide();
  });

  jQuery.get(pg, '', function (data) {
    jQuery('#targetview').html(data);
    //scroll(0,0);
  });
  return false;
}
