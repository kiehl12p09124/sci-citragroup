<div class="row">

    <div class="col-3">
        <!-- small box -->
        <div class="small-box bg-primary">
        <div class="inner">
            <h3><?= $data['status']['pending'];?></h3>
            <p>PENDING</p>
        </div>
        <div class="icon">
            <i class="fas fa-clock"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-3">
        <!-- small box -->
        <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $data['status']['on_proccess'];?></h3>
            <p>ON PROCCESS</p>
        </div>
        <div class="icon">
            <i class="fas fa-truck"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-3">
        <!-- small box -->
        <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $data['status']['done'];?></h3>
            <p>DONE</p>
        </div>
        <div class="icon">
            <i class="fas fa-check"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-3">
        <!-- small box -->
        <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $data['status']['closed'];?></h3>
            <p>CLOSED</p>
        </div>
        <div class="icon">
            <i class="fas fa-ban"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>