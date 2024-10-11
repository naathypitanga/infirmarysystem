$(document).ready(function() {
  update();
})

var badg = document.querySelector('#badge');

function update() {
  $('#dropdownMenuButton2').click(function() {
    var usuario = $("#dropdownMenuButton2").val();
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: "http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/header/update.php?usuario=" + usuario
    })
    badg.classList.add('hdr-notification-badge');
  })
}

const delNoti = (idNoti) => {
  $.ajax({
    url: 'http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/php/notificacao/delNoti.php',
    method: 'POST',
    data: {
      notId: idNoti
    }
  });
}