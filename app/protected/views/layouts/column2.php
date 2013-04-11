<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <div class="sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Задачи</li>
                    <li class="active"><a href="#"><i class="icon-envelope"></i> Новые <span class="badge">5</span></a>
                    </li>
                    <li><a href="#"><i class="icon-star"></i>Избранные</a></li>
                    <li><a href="#">Созданные мной</a></li>
                    <li><a href="#">Назначенные мне</a></li>

                    <li class="nav-header">Фильтры</li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>

                    <li class="nav-header">Проекты</li>
                    <li><a href="#">Philips</a></li>
                    <li><a href="#">Oursson</a></li>


                </ul>
            </div>
        </div>
        <!--/span-->
        <div class="span10">

            <div class="row-fluid issue-toolbar">




                    <div class="span6">
                        <div class="btn-toolbar">
                        <a class="btn"  rel="tooltip" title="first tooltip" href="#"><i class="icon-check"></i></a>

                        <div class="btn-group">
                            <button rel="tooltip" title="first tooltip" class="btn">Left</button>
                            <button rel="tooltip" title="first tooltip" class="btn">Middle</button>
                            <button rel="tooltip" title="first tooltip" class="btn">Right</button>
                        </div>
                        </div>
                    </div>
                    <div class="span4 offset2">
                        <div class="btn-group">
                            <button class="btn"><i class="icon-list"></i></button>
                            <button class="btn"><i class="icon-th"></i></button>
                            <button class="btn"><i class="icon-tasks"></i></button>
                        </div>
                    </div>
                </div>



            <div class="row-fluid">
                <table>

                    <tr>
                        <td></td>
                    </tr>

                </table>

            </div>
            <!--/row-->

        </div>
        <!--/span-->
    </div>
    <!--/row-->

    <hr>

    <footer>
        <p>&copy; Company 2013</p>
    </footer>

</div><!--/.fluid-container-->

<?php $this->endContent(); ?>



