<div class="row" style="margin-top: -60px">
    <div class="alert alert-info alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Увага!</strong> Вам необхідно підтвердити номер телефону у налаштуваннях акаунту.
    </div>


    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home" data-toggle="tab">Новий виклик</a></li>
        <li><a href="#status" data-toggle="tab">Статус виклику</a></li>
        <li><a href="#messages" data-toggle="tab">Інформація</a></li>
        <li><a href="#settings" data-toggle="tab">Налаштування аккаунту</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <div class="container">
                <div class="row" style="margin-top: 2%">
                    <div class="col-md-8 col-lg-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Новий виклик</div>
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ім'я</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Введіть ім'я">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Місто</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Оберіть ваше місто">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Адреса</label>
                                        <textarea class="form-control" rows="3" placeholder="Адреса"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="exampleInputPassword1">Номер телефону</label>
                                                    <span class="help-block">Номер телефону для контакту під час виклику. Ви повинні підтвердити номер, щоб мати змогу зареєструвати виклик.</span>
                                                    <input type="text" class="form-control" id="exampleInputPassword1" value="+380(95)123-45-12" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Симптоми</label>
                                            <span class="help-block">Оберіть симптоми, що стали причиною для виклику.</span>
                                            <select class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Далі</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="status">
            <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Бригада визначена.</strong> Будь-ласка, за можливості зустріньте працівників.
            </div>
            <div class="container">
                <div class="row" style="margin-top: 2%">
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">Інформація виклику</div>
                            <div class="panel-body">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Номер бригади</th>
                                        <td>7201/1</td>
                                    </tr>
                                    <tr>
                                        <th>Орієнтовний час приїзду (хвилин)</th>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <th>Контактне ім'я</th>
                                        <td>Володимир</td>
                                    </tr>
                                    <tr>
                                        <th>Телефон</th>
                                        <td>+380(95)123-45-12</td>
                                    </tr>
                                    <tr>
                                        <th>Адреса</th>
                                        <td>вул. Білгородська 8, кв. 112</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="http://0.0.0.0:8080/img.png" class="img-responsive" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="messages">jhgfd</div>
        <div class="tab-pane" id="settings">
            <div class="container">
                <div class="row" style="margin-top: 2%">
                    <div class="col-md-8 col-lg-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Налаштування акаунту</div>
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ім'я</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Введіть ім'я">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Місто</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Оберіть ваше місто">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Адреса</label>
                                        <span class="help-block">Адреса за умовчанням для виклику. Ви можете вказати іншу адресу під час реєстрації виклику.</span>
                                        <textarea class="form-control" rows="3" placeholder="Адреса"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="exampleInputPassword1">Номер телефону</label>
                                                    <span class="help-block">Номер телефону для контакту під час виклику. Ви повинні підтвердити номер, щоб мати змогу зареєструвати виклик.</span>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="+380">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-success" style="margin-top: 80px">Підтвердити</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Зберегти</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(function () {
        $('#myTab a:last').tab('show')
    })
</script>