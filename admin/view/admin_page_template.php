
<?php

if (!empty($_POST['token'])){
    $show_cats =[];
    foreach ($_POST as $key => $value){
        if ($key == 'submit'){
            continue;
        }
        $show_cats[$key] = $value;
    }
    update_option('show_cats', $show_cats);
}
$show_list = get_option('show_cats');
?>

<h1><?php _e('Cats show settings', 'cats_show') ?></h1>
<p><?php _e('Use this shortcode to show info on your page - ', 'cats_show') ?><strong>[show_cats]</strong></p>
<div class="admin_page">
    <p><strong><?php _e('First you need type your token into field below', 'cats_show' ) ?></strong></p>
    <form action="" method="post">
        <input required type="text" value="<?php echo  isset($show_list['token']) ? $show_list['token'] :''; ?>" name="token">

        <p><strong><?php _e('Please, choose options witch you want to be showed', 'cats_show') ?></strong></p>
        <p>
            <input <?php echo isset($show_list['image']) ? 'checked' : ''; ?>
                    type="checkbox"
                    name="image">
            <span><?php _e('image', 'cats_show') ?></span>
        </p>
        <p>
            <input <?php echo isset($show_list['id']) ? 'checked' : ''; ?>
                    type="checkbox"
                    name="id">
            <span><?php _e('id', 'cats_show') ?></span>
        </p>
        <p>
            <input <?php echo isset($show_list['description']) ? 'checked' : ''; ?>
                    type="checkbox"
                    name="description">
            <span><?php _e('description', 'cats_show') ?></span>
        </p>
        <p>
            <input <?php echo isset($show_list['temperament']) ? 'checked' : ''; ?>
                    type="checkbox"
                    name="temperament">
            <span><?php _e('temperament', 'cats_show') ?></span>
        </p>
        <p>
            <input <?php echo isset($show_list['life_span']) ? 'checked' : ''; ?>
                    type="checkbox"
                    name="life_span">
            <span><?php _e('life span', 'cats_show') ?></span>
        </p>
        <p>
            <input <?php echo isset($show_list['hypoallergenic']) ? 'checked' : ''; ?>
                    type="checkbox"
                    name="hypoallergenic">
            <span><?php _e('is hypoallergenic', 'cats_show') ?></span>
        </p>
        <p>
            <input <?php echo isset($show_list['wikipedia_url']) ? 'checked' : ''; ?>
                    type="checkbox"
                    name="wikipedia_url">
            <span><?php _e('wikipedia link', 'cats_show') ?></span>
        </p>

        <?php submit_button(); ?>
    </form>
</div>



