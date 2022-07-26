<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="/fontawesome-6-1-1/css/all.css" rel="stylesheet">
        <script defer src="/fontawesome-6-1-1/js/all.js"></script>
        <title>ToDoList</title>
        <link rel="stylesheet" href="{{ url('css/style.css') }}" type="text/css">

    </head>
    <body>
        <div class="modal fade bd-example-modal-lg" id="ModalTask" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div style = "background-color : rgb(121, 121, 250)" class="modal-header">
                        <h4 id="" style = "color : #ffff; font-weight: bolder;" class="modal-title" id="">Modification</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ui-front">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" name="inputTextModal" class="form-control" id="inputTextModal" placeholder="Tâche">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="" id="ModifTask" class="btn btn-primary mb-2">Modifier</button>
                            </div>
                        </div>
                        <span id="InputTextModalError" class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            To Do List Appli
        </div>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Erreur</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div></div>
        <div class="container2">
            <form action="{{ route('tasks.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" name="inputText" class="form-control" id="inputText" placeholder="Tâche">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <div class="row">
                @if(count($tasks) > 0)
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light" style=" font-weight:bold; color: orange">
                            <th>Tâche</th>
                            <th>Description</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                            <th>Terminée</th>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <th>{{ $task->id }}</th>
                                <td id="Name{{ $task->id }}" value="{{ $task->name }}">{{ $task->name }}</td>
                                @if($task->end_task == 'Oui')
                                    <td>
                                        <a  class="editRow styleList" id="fa-pen{{ $task->id }}"  data-id="{{ $task->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a  class="delRow styleList" id="fa-trash{{ $task->id }}" data-id="{{ $task->id }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <input class="form-check-input checkEnd" type="checkbox" value="" data-id="{{ $task->id }}" checked></input>
                                    </td>
                                @else
                                    <td>
                                        <a  class="editRow" id="fa-pen{{ $task->id }}"  data-id="{{ $task->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a  class="delRow" id="fa-trash{{ $task->id }}"  data-id="{{ $task->id }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <input class="form-check-input checkEnd" type="checkbox" value="" data-id="{{ $task->id }}"></input>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            {!! $tasks->links() !!}
        </div>
        @stack('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css"
        rel="stylesheet"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <script>
            $(".btn-close").on('click', function(){
                $("#ModalTask").modal('toggle');
            })

            $("body").on('click','.editRow', function(event){
                var id = $(this).data("id");
                var Desc = $("#Name"+id).text();

                $("#ModalTask").modal('toggle');
                $("#inputTextModal").val(Desc);

                $("#ModifTask").on('click', function(){
                    var description = $("#inputTextModal").val();

                    $.ajax({
                        data:{id :id, description : description, _token :$('input[name="_token"]').val() },
                        dataType: 'json',
                        url:"{{ route('tasks.update') }}",
                        type : "POST",
                        success : function(response){
                            swal("Tâche modifiée!!", {
                                icon: "success",
                                buttons : false,
                            });
                            $("#ModalTask").modal('toggle');
                            location.reload(true);
                        },
                        error : function(error){
                            $('#InputTextModalError').html(error.responseJSON.errors.description);
                        }
                    });
                })


            })
            $("body").on('click','.delRow', function(event){
                var id = $(this).data("id");
                swal({
                    title: "Voulez-vous supprimer la tâche No."+id+ "?",
                    text: " ",
                    icon: "error",
                    buttons:["Non", "Oui"],
                    dangerMode:true,
                })
                .then((willDelete) =>{
                    if(willDelete){
                        $.ajax({
                            data:{id :id, _token :$('input[name="_token"]').val() },
                            dataType: 'json',
                            url:"{{ route('tasks.destroy') }}",
                            type : "POST",
                            success : function(response){
                                swal("Tâche supprimée!!", {
                                    icon: "success",
                                    buttons : false,
                                });

                                location.reload(true);
                            },
                            error : function(){

                            }
                        });

                    }else{
                        swal("suppression annulée!!",{
                            buttons:false,
                            timer : 1000,
                        });
                    }
                });
            });

            $("body").on('click','.editRow', function(event){

            });

            $("body").on('click','.checkEnd[type=checkbox]', function(event){
                var id = $(this).data("id");
                if($(this).is(":checked")){
                    $("#fa-pen"+id).addClass('styleList');
                    $("#fa-trash"+id).addClass('styleList');
                    $.ajax({
                        data:{id :id, _token :$('input[name="_token"]').val() },
                        dataType: 'json',
                        url:"{{ route('tasks.endtrue') }}",
                        type : "POST",
                        success : function(response){
                            swal("Tâche No"+id+" terminée !!", {
                                icon: "success",
                                buttons : false,
                                timer : 1500,
                            });
                        },
                        error : function(){

                        }
                    });
                }else{
                    $("#fa-pen"+id).removeClass('styleList');
                    $("#fa-trash"+id).removeClass('styleList');
                    $.ajax({
                        data:{id :id, _token :$('input[name="_token"]').val() },
                        dataType: 'json',
                        url:"{{ route('tasks.endfalse') }}",
                        type : "POST",
                        success : function(response){
                        },
                        error : function(){

                        }
                    });
                }
            });
        </script>
        <style>
            body{
                font-family: cursive;
                font-size:15px;
                padding: 20px 0 0 0;
                background: #fff;
                overflow:hidden;
            }

            .container{
                width: 60%;
                max-width: 300px !important;
                margin: 0 auto;
                background: #fff;
                border: 1px solid #cccccc;
                padding: 20px;
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                font-weight: bold;
                font-size: 20px;
                text-align: center;
            }

            .container2{
                width: 80%;
                max-width: 700px !important;
                margin: 50px auto;
                background: #fff;
                border: 1px solid #cccccc;
                padding: 20px;
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                font-weight: bold;
                font-size: 20px;
                text-align: center;
            }

            .alert{
                width: 60%;
                max-width: 600px !important;
                margin: 10px auto;
                background: #fff;
                border: 1px solid #cccccc;
                padding: 5px;
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                font-size: 20px;
            }

            table>thead>*{
                background-color: rgb(121, 121, 250);
                font-size: 18px;
                color: #fff;
            }

            .fa-trash-can{
                color:red;
                border-radius: 4px;
                font-weight: bold;
                font-size: 20px;
            }

            .fa-pen-to-square{
                color:blue;
                border-radius: 4px;
                font-weight: bold;
                font-size: 20px;
            }

            a{
                cursor:pointer;
            }

            .styleList{
                display: none;
            }

            tr .form-check-input:checked{
                border-color: green !important;
                background-color: green !important;
                border-radius: 4px;
                font-weight: bold;
                font-size: 20px;
            }

            nav{
                margin-top : 15px;
            }

        </style>
    </body>
</html>
