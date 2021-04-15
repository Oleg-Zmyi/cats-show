<?php if (!empty($_REQUEST['cat'])) : ?>
    <?php
    $breed_url = 'https://api.thecatapi.com/v1/images/search?breed_id=' . $_REQUEST['cat'];
    $breed_info = $this->get_api_response($breed_url, $this->token);
        if (!empty($breed_info)) : ?>
            <h3><?php echo $breed_info[0]->breeds[0]->name ?></h3>
            <?php
            if (isset($this->show_list['image'])) : ?>
                <div class="img_wrap">
                    <img src="<?php echo $breed_info[0]->url ?>" alt="<?php echo $breed_info[0]->breeds[0]->name?>">
                </div>
            <?php endif;
            if (isset($this->show_list['id'])) : ?>
                <p>
                    <span class="label"><?php _e('id -  ', 'cats_show') ?> </span>
                    <?php echo $breed_info[0]->breeds[0]->id?>
                </p>
            <?php endif;
            if (isset($this->show_list['description'])) : ?>
                <p>
                    <span class="label"><?php _e('description -  ', 'cats_show') ?></span>
                    <?php echo $breed_info[0]->breeds[0]->description?>
                </p>
            <?php endif;
            if (isset($this->show_list['temperament'])) : ?>
                <p>
                    <span class="label"><?php _e('temperament -  ', 'cats_show') ?></span>
                    <?php echo $breed_info[0]->breeds[0]->temperament?>
                </p>
            <?php endif;
            if (isset($this->show_list['hypoallergenic'])) : ?>
                <p>
                    <span class="label"><?php _e('hypoallergenic -  ', 'cats_show') ?></span><?php _e('yes', 'cats_show') ?>
                </p>
            <?php endif;
            if (isset($this->show_list['life_span'])) : ?>
                <p>
                    <span class="label"><?php _e('life span -  ', 'cats_show') ?></span>
                    <?php echo $breed_info[0]->breeds[0]->life_span?> <?php _e('years', 'cats_show') ?>
                </p>
            <?php endif;
            if (isset($this->show_list['wikipedia_url'])) : ?>
                <p>
                    <span class="label"><?php _e('read more on - ', 'cats_show') ?></span>
                    <a target="_blank" href=" <?php echo $breed_info[0]->breeds[0]->wikipedia_url?>">
                        <?php _e('wiki', 'cats_show') ?>
                    </a>
                </p>
            <?php endif; ?>
        <?php else : ?>
        <p><?php _e('Oops, something went wrong', 'cats_show') ?></p>
        <?php endif; ?>
<?php endif;
