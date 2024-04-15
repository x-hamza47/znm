<?php  
    require_once "./php/config.php";
    $db = new dataSend();
    $limit = 8;
    $select = "projects.project_id,projects.project_name,projects.project_desc,projects.location,projects.status,categories.name AS c_name,sub_categories.name AS s_name,
    (SELECT project_image FROM project_images WHERE project_images.pid = projects.project_id LIMIT 1) AS image";
    $join = "LEFT JOIN categories ON projects.category = categories.cid LEFT JOIN sub_categories ON projects.sub_category = sub_categories.id LEFT JOIN project_images ON projects.project_id = project_images.pid WHERE projects.status = '1'";
    $groupBy = "projects.project_id";
    $response = $db->select("projects",$select,$join,null,"projects.id DESC",$limit,1,$groupBy);
    foreach ($response as $data) {

    ?>
    <!-- card 1-->
    <div class="swiper-slide cards">
    <div class="card-content">
        <div class="image">
        <img src="admin/uploads/<?php echo $data['image']; ?>">
        </div>
        <div class="drawing-detail">
        <h4><?php echo $data['project_name']; ?></h4>
        <p><?php echo substr($data['project_desc'],0,150).'... ' ; ?></p>
        <span id="cat"><span>Category : </span><em><?php echo $data['s_name']; ?></em></span>
        <address><span>Location : </span><em><?php echo $data['location']; ?></em></address>
    </div>
    </div>
    </div>
    <?php
    }
?>
