var myModal = new bootstrap.Modal(document.getElementById('myModal'));
let frm = document.getElementById('formulario');
let eliminar = document.getElementById('btnEliminar');

  var events = [];
  document.addEventListener('DOMContentLoaded', function() {
    if (!!scheds) {
        Object.keys(scheds).map(k => {
            var data = scheds[k]
            events.push({ id: data.id, title: data.title, start: data.start_datetime, end: data.end_datetime });
        })
    }

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'es',
      headerToolbar: {
        left: 'prev next today',
        center: 'title',
        right: 'dayGridMonth timeGridWeek listWeek'
      },
      events: events,
      editable: true,
      dateClick: function(info){
        //console.log(info);
        frm.reset();
        document.getElementById('btnRegistrar').textContent = 'Registrar';
        document.getElementById('titulo').textContent = 'Registro de Cita';

        document.getElementById('id').value = '';

        eliminar.classList.add('d-none');
        myModal.show();
      },
      eventClick : function(info){
        //console.log(info.event.startStr, info.event.endStr)
        document.getElementById('btnRegistrar').textContent = 'Modificar';
        document.getElementById('titulo').textContent = 'Modificar Cita';
    
        document.getElementById('id').value = info.event.id;
        document.getElementById('title').value = info.event.title;
        document.getElementById('color').value = info.event.backgroundColor;
        document.getElementById('start_datetime').value = (String(info.event.startStr).replace("T", " ")).replace("-06:00", "");
        document.getElementById('end_datetime').value = (String(info.event.endStr).replace("T", " ")).replace("-06:00", "");
        
        eliminar.classList.remove('d-none');
        myModal.show();
      },
      eventDrop: function(info){
        const id = info.event.id;
        const start_datetime = (String(info.event.startStr).replace("T", " ")).replace("-06:00", "");
        const end_datetime = (String(info.event.endStr).replace("T", " ")).replace("-06:00", "");

        const url = base_url + 'Home/drop';
        const http = new XMLHttpRequest();
        const data = new FormData();
        data.append('id', id);
        data.append('start_datetime', start_datetime);
        data.append('end_datetime', end_datetime);
        http.open('POST', url, true);
        http.send(data);
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const respuesta = JSON.parse(this.responseText);
                console.log(respuesta);
                if(respuesta.estado){
                    calendar.refetchEvents(); //Cargar los eventos que se acaban de agregar
                }
                swal.fire(
                    'Aviso',
                    respuesta.msg,
                    respuesta.tipo
                )
            }
        }
      }
    });
    calendar.render();

    frm.addEventListener('submit', function(e){
      e.preventDefault();

      const usuario = document.getElementById('usuario').value;
      const title = document.getElementById('title').value;
      const color = document.getElementById('color').value;
      const start_datetime = document.getElementById('start_datetime').value;
      const end_datetime = document.getElementById('end_datetime').value;

      if(usuario == '' || title == '' || color == '' || start_datetime == '' || end_datetime == ''){
        swal.fire(
          'Aviso',
          'Debes completar todos los campos',
          'warning'
        )
      }else{
        const url = base_url + 'Home/registrar';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const respuesta = JSON.parse(this.responseText);
                console.log(respuesta);
                if(respuesta.estado){
                  calendar.refetchEvents(); //Cargar los eventos que se acaban de agregar
                }
                myModal.hide(); //Ocultamos modal
                swal.fire(
                    'Aviso',
                    respuesta.msg,
                    respuesta.tipo
                )
            }
        }
      }
    })

    eliminar.addEventListener('click', function(){
        myModal.hide();
        Swal.fire({
          title: '¡Advertencia!',
          text: "¿Estas seguro de eliminar?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            const id = document.getElementById('id').value;
            const url = base_url + 'Home/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    //console.log(this.responseText);
                    const respuesta = JSON.parse(this.responseText);
                    console.log(respuesta);
                    if(respuesta.estado == true){
                      calendar.refetchEvents(); //Cargar los eventos que se acaban de agregar
                    }
                    swal.fire(
                        'Aviso',
                        respuesta.msg,
                        respuesta.tipo
                    )
                  }
              }
            }
          })
      })
  });