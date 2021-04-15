<?php

class CatsFrontend {


    private $allBreeds = [];

    private $token;

    private $show_list;

    public function set_data(){
        $options = get_option('show_cats', false);

        if (isset($options)){
            $this->show_list = $options;
        }

        if (isset($options['token'])){
            $this->token = $options['token'];
            $this->allBreeds = $this->get_api_response('https://api.thecatapi.com/v1/breeds?limit=50', $this->token );
        }
    }



    //Enqueue Front
    public function enqueue_front()
    {
        wp_enqueue_style('frontend_cats_style', plugins_url('assets/frontend/styles/main.css',__DIR__ ));
    }

    //Get response from api service
    public function get_api_response($url, $token) {

        $response = wp_remote_get( $url ,
            array( 'timeout' => 10,
                'method' => "GET",
                'headers' => array(
                    'x-api-key'=> $token,
                )
            )
        );
        $response_body = wp_remote_retrieve_body($response);
        return json_decode($response_body);

    }

    //Create Shortcode
    function show_cats(){ ?>

        <?php if ($this->show_list) : ?>
            <div class="cats_wrap">
                <br>
                <h3><?php _e('Do you like cats?', 'cats_show') ?></h3>
                <p><?php _e('Here you will find more information about your favorite breed of cats', 'cats_show') ?></p>

                <!--    Get list with breeds   -->
                <?php $this->show_cats_form(); ?>

                <!--    Get info about breed    -->
                <?php $this->show_info_about_breed(); ?>
            </div>
        <?php else: ?>
            <p class="error_message"><?php _e('First you need save token key', 'cats_show') ?></p>
        <?php endif; ?>

    <?php }

    //Create form
    public function show_cats_form(){ ?>
        <?php if (!empty($this->allBreeds)): ?>
            <form action="" method="post">
                <select name="cat">
                    <?php foreach ($this->allBreeds as $breed) : ?>
                        <?php if ($_REQUEST['cat'] == $breed->id ): ?>
                            <option selected value="<?php echo $breed->id ?>"><?php echo $breed->name; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $breed->id ?>"><?php echo $breed->name; ?></option>
                        <?php endif;?>
                    <?php endforeach; ?>
                </select>
                <button type="submit"><?php _e('more info', 'cats_show') ?></button>
            </form>
        <?php endif; ?>
    <?php }

    //SHow info about current breed
    public function show_info_about_breed(){

        include plugin_dir_path(__FILE__) . 'view/cats_frontend.php';

    }

}