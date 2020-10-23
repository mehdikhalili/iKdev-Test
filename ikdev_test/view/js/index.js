
var volume_m3txt = 0;

function objetCardHTML(id, nom, volume_m3, categorie, img) {
  var txtHTML = 
    '<div id="'+ id +'" class="objet-card px-1 mb-2 col-xl-4 col-lg-6 col-md-12">'+
      '<div class="card py-1 px-3 shadow-sm" style="height: 188px;">'+
        '<div class="row">'+
          '<img class="card-img-top col-6" src="./images/'+ img +'" style="width: 100%; height: 180px;">'+
          '<div class="col-6">'+
            '<div style="height: 60%;">'+
              '<div class="pt-2" style="height: 60%;">'+
                '<b class="nom_objet">'+ nom +'</b>'+
              '</div>'+
              '<div class="small">'+
                '<span class="'+ categorie +'">Catégorie : '+ categorie +'</span><br>'+
                '<span>Volume : '+ volume_m3 +'m<sup>3</sup></span>'+
              '</div>'+
            '</div>'+
            '<div class="card-footer d-flex">'+
              '<div class="mx-auto form-inline">'+
                '<button class="minus-btn btn btn-danger p-0" style="height: 30px; width: 32px;"><b>-</b></button>'+
                '<input class="nb-input form-control text-center p-0 mx-1" type="text" value="0" style="height: 30px; width: 55px;" readonly>'+
                '<button class="plus-btn btn btn-success p-0" style="height: 30px; width: 32px;"><b>+</b></button>'+
                '<input class="num-input" type="number" value="'+ volume_m3 +'" hidden>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>';
  return txtHTML;
}


// jQuery
$(document).ready(function(){
        
  // Catégories Side Bar
  var navHTMLtxt = '';
  ListeCategories.forEach(categorie => {
    navHTMLtxt = 
      '<li class="nav-item">'+
        '<a class="nav-link pl-4 py-1" href="javascript:void(0)">'+
          '<input type="text" value="'+ categorie +'" hidden>'+
          '<span><b>'+ categorie +'</b></span>'+
        '</a>'+
      '</li>';
    $("#accordionSidebar").append(navHTMLtxt);
  });


  // Objects cards par défault
  ListeObjets.forEach(objet => {
    var txtHTML = objetCardHTML(objet.id, objet.nom, objet.volume_m3, objet.categorie, objet.img);
    $("#listeObjets").append(txtHTML);
  });


  // Si l'utilisateur clique sur le logo le système va afficher tous les objets
  $("a.sidebar-brand").click(function(){
    $("#listeObjets").children().show();
  });

  // Si l'utilisateur clique sur une catégorie de la nav-bar
  $("a.nav-link").click(function() {
    var varCategorie = $(this).find("input").val();
    $("#listeObjets").children().hide();
    $("#listeObjets").find("span."+ varCategorie).parentsUntil("#listeObjets").show();
  });
  

  // Si l'utilisateur clique sur '+'
  $("button.plus-btn").click(function() {
    var volume = parseFloat(volume_m3txt).toFixed(2);
    var inputValue = parseInt($(this).siblings("input.nb-input").val());
    var volumeValue = parseFloat($(this).siblings("input.num-input").val());
    var n = parseFloat(volume) + parseFloat(volumeValue);
    if (n <= 99.99) {
      $(this).siblings("input.nb-input").attr("value", inputValue+1);
      volume = parseFloat(volume) + parseFloat(volumeValue);
      volume_m3txt = volume.toFixed(2);

      $("#volume_txt").text(volume_m3txt);
      $("#volume_input").attr("value", volume_m3txt);
    }
  });

  // Si l'utilisateur clique sur '-'
  $("button.minus-btn").click(function() {
    var volume = parseFloat(volume_m3txt).toFixed(2);
    var inputValue = parseInt($(this).siblings("input.nb-input").val());
    var volumeValue = parseFloat($(this).siblings("input.num-input").val());
    if (inputValue > 0) {
      $(this).siblings("input.nb-input").attr("value", inputValue-1);
      var n = parseFloat(volume) - parseFloat(volumeValue);
      if (volume - volumeValue >= 0) {
        volume = parseFloat(volume) - parseFloat(volumeValue);
        volume_m3txt = volume.toFixed(2);

        $("#volume_txt").text(volume_m3txt);
        $("#volume_input").attr("value", volume_m3txt);
      }
    }
  });


  // Si l'utilisateur clique sur 'Remise à zéro'
  $("#remise_btn").click(function(){
    volume_m3txt = 0;
    $("#volume_txt").text("0.00");
    $("#volume_input").attr("value", 0);
    $("input.nb-input").attr("value", 0);
  });

  // Si l'utilisateur clique sur 'Valider'
  $("#valider_btn").click(function(){
    var volume = $("#volume_input").val();
    if (volume != 0) {
      volume = parseFloat(volume).toFixed(2);
      $.post("ajax/ajax.php", {volume: volume}, function(data){
        if (data == '1') {
          volume_m3txt = 0;
          $("#volume_txt").text("0.00");
          $("#volume_input").attr("value", 0);
          $("input.nb-input").attr("value", 0);
        } else {
          alert("Erreur de connexion");
        }
      });
    }
  });


  // Si l'utilisateur cherhe un objet
  $("#recherche_input").keyup(function(){
    $("#listeObjets").children().show();
    var value = $(this).val().toLowerCase();
    $("div.objet-card").filter(function(){
      $(this).toggle($(this).find("b.nom_objet").text().toLowerCase().indexOf(value) > -1);
    });
  });

});