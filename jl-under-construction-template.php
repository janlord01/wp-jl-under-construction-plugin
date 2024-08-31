<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html(get_bloginfo('name')); ?> - Under Construction</title>
    <style>
        body {
            position: relative;
            text-align: center;
            padding: 50px;
            font-family: Arial, sans-serif;
            background: url('<?php 
                $background_image = get_option('jl_ucp_background_image');
                if (empty($background_image)) {
                    echo esc_url(plugin_dir_url(__FILE__) . 'bg.jpg');
                } else {
                    echo esc_url($background_image);
                }
            ?>') no-repeat center center;
            background-size: cover;
            color: #000;
            margin: 0;
            height: 100vh;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            <?php 
                $overlay_enabled = get_option('jl_ucp_overlay_enabled');
                if ($overlay_enabled) {
                    $overlay_color = get_option('jl_ucp_overlay_color', 'rgba(0, 0, 0, 0.5)');
                    echo 'background-color: ' . esc_attr($overlay_color) . ';';
                } else {
                    echo 'background-color: rgba(0, 0, 0, 0.5);';
                }
            ?>
            z-index: 1;
        }

        h1, p {
            position: relative;
            z-index: 2;
        }

        h1 {
            font-size: 50px;
            margin-top: <?php echo esc_attr(get_option('jl_ucp_h1_margin_top', '20%')); ?>;
			text-transform: uppercase !important;
            color: <?php echo esc_attr(get_option('jl_ucp_h1_color', '#ffffff')); ?>;
        }

        p {
            font-size: 20px;
            margin: <?php echo esc_attr(get_option('jl_ucp_p_margin_top', '20px')); ?> 0;
            color: <?php echo esc_attr(get_option('jl_ucp_p_color', '#ffffff')); ?>;
        }

		a {
			color: <?php echo esc_attr(get_option('jl_ucp_p_color', '#ffffff')); ?>;
		}

        .social-links {
            margin-top: 30px;
            position: relative;
            z-index: 2;
        }

        .social-links a {
            margin: 0 10px;
            font-size: 24px;
            color: #000;
            text-decoration: none;
        }

        .social-links a:hover {
            text-decoration: underline;
        }
    
    </style>
</head>
<body>
    <h1><?php echo esc_html(get_option('jl_ucp_heading', "We're Under Construction")); ?></h1>
    <p><?php echo nl2br(esc_html(get_option('jl_ucp_message', "Our website is currently undergoing scheduled maintenance. Please check back soon."))); ?></p>

    <div class="social-links">
        <?php if ($facebook = get_option('jl_ucp_facebook')): ?>
            <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'fb.png') ?>" width="30" />
            </a>
        <?php endif; ?>

        <?php if ($instagram = get_option('jl_ucp_instagram')): ?>
            <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'insta.png') ?>" width="30" />
            </a>
        <?php endif; ?>

        <?php if ($tiktok = get_option('jl_ucp_tiktok')): ?>
            <a href="<?php echo esc_url($tiktok); ?>" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'tiktok.webp') ?>" width="30" />
            </a>
        <?php endif; ?>
    </div>
    <p style="font-size: 12px;">Plugin Created By: <br/> <a href="https://janlordluga.com/">Janlord Luga</a></p>

</body>
</html>
