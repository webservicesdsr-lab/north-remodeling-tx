<?php
/**
 * Home Page - Remodel North Texas
 * Path: /wp-content/themes/nexus-shell-theme/pages/home-page.php
 *
 * The global navbar/header is handled by KNX Shell.
 * This file controls the homepage body only.
 */

if (!defined('ABSPATH')) {
    exit;
}

$is_logged_in = is_user_logged_in();
$current_user  = $is_logged_in ? wp_get_current_user() : null;
$display_name  = ($current_user && !empty($current_user->display_name)) ? $current_user->display_name : 'Homeowner';

/**
 * Development cache buster.
 * Replace with a fixed version before production.
 */
$rntx_home_version = time();

$services = array(
    array(
        'name'        => 'Kitchen Remodeling',
        'type'        => 'Kitchen',
        'slug'        => 'kitchen',
        'icon'        => 'kitchen',
        'description' => 'Increase value & functionality.',
    ),
    array(
        'name'        => 'Bathroom Remodel',
        'type'        => 'Bathroom',
        'slug'        => 'bathroom',
        'icon'        => 'bath',
        'description' => 'Modern. Beautiful. Built to last.',
    ),
    array(
        'name'        => 'Flooring',
        'type'        => 'Flooring',
        'slug'        => 'flooring',
        'icon'        => 'floor',
        'description' => 'Style under every step.',
    ),
    array(
        'name'        => 'Roofing',
        'type'        => 'Roofing',
        'slug'        => 'roofing',
        'icon'        => 'roof',
        'description' => 'Protect what matters most.',
    ),
    array(
        'name'        => 'Home Additions',
        'type'        => 'Addition',
        'slug'        => 'additions',
        'icon'        => 'home',
        'description' => 'More space. More life.',
    ),
    array(
        'name'        => 'Painting',
        'type'        => 'Painting',
        'slug'        => 'painting',
        'icon'        => 'paint',
        'description' => 'Refresh, restore, renew.',
    ),
);

$contractors = array(
    array(
        'name'     => 'Elite Remodeling Group',
        'city'     => 'Frisco, TX',
        'rating'   => '5.0',
        'reviews'  => '127',
        'tag'      => 'Top Pro',
        'initials' => 'E',
        'points'   => array('Licensed & Insured', '12+ years experience', '230+ projects completed'),
    ),
    array(
        'name'     => 'Metro Home Solutions',
        'city'     => 'Plano, TX',
        'rating'   => '4.9',
        'reviews'  => '98',
        'tag'      => '',
        'initials' => 'M',
        'points'   => array('Licensed & Insured', '8+ years experience', '180+ projects completed'),
    ),
    array(
        'name'     => 'NorthStar Construction',
        'city'     => 'McKinney, TX',
        'rating'   => '4.9',
        'reviews'  => '156',
        'tag'      => 'Top Pro',
        'initials' => 'N',
        'points'   => array('Licensed & Insured', '12+ years experience', '310+ projects completed'),
    ),
);

$materials = array(
    array(
        'name' => 'Quartz Countertops',
        'slug' => 'quartz',
    ),
    array(
        'name' => 'Luxury Vinyl Plank',
        'slug' => 'lvp',
    ),
    array(
        'name' => 'Porcelain Tile',
        'slug' => 'tile',
    ),
    array(
        'name' => 'Cabinetry',
        'slug' => 'cabinetry',
    ),
    array(
        'name' => 'Backsplashes',
        'slug' => 'backsplashes',
    ),
);

$cities = array(
    'Frisco',
    'Plano',
    'McKinney',
    'Allen',
    'Prosper',
    'The Colony',
    'Denton',
    'Dallas',
    'Fort Worth',
);
?>

<link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/pages/home/home-base.css'); ?>?v=<?php echo esc_attr($rntx_home_version); ?>">
<link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/pages/home/home-hero.css'); ?>?v=<?php echo esc_attr($rntx_home_version); ?>">
<link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/pages/home/home-sections.css'); ?>?v=<?php echo esc_attr($rntx_home_version); ?>">
<link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/pages/home/home-dashboard.css'); ?>?v=<?php echo esc_attr($rntx_home_version); ?>">
<link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/pages/home/home-modal.css'); ?>?v=<?php echo esc_attr($rntx_home_version); ?>">
<link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/pages/home/home-responsive.css'); ?>?v=<?php echo esc_attr($rntx_home_version); ?>">

<main id="rntx-home" class="rntx-home" data-rntx-home>
    <?php if (!$is_logged_in) : ?>

        <section class="rntx-hero rntx-hero--magazine" aria-labelledby="rntx-hero-title">
            <div class="rntx-hero__photo" aria-hidden="true"></div>
            <div class="rntx-hero__wash" aria-hidden="true"></div>

            <div class="rntx-shell rntx-hero__shell">
                <div class="rntx-hero__content">
                    <h1 id="rntx-hero-title" class="rntx-hero__title">
                        Remodel with<br>
                        Confidence.<br>
                        <span>Love</span> Your Home.
                    </h1>

                    <p class="rntx-hero__copy">
                        Top-rated remodeling experts delivering beautiful results across North Texas.
                    </p>

                    <div class="rntx-hero__actions">
                        <button class="rntx-btn rntx-btn--primary rntx-hero__primary" type="button" data-rntx-open-estimate>
                            Get My Free Estimate
                            <span aria-hidden="true">→</span>
                        </button>

                        <button class="rntx-btn rntx-btn--white rntx-hero__secondary" type="button" data-rntx-scroll-target="#rntx-services">
                            <span class="rntx-hero__button-icon" aria-hidden="true"></span>
                            Explore Projects
                        </button>
                    </div>

                    <div class="rntx-project-card" data-rntx-discovery-card>
                        <div class="rntx-project-card__head">
                            <h2>Plan Your Project in Minutes</h2>
                            <span>New</span>
                        </div>

                        <form class="rntx-project-search" data-rntx-estimate-entry>
                            <label class="screen-reader-text" for="rntx-project-search">
                                Plan your project
                            </label>

                            <div class="rntx-project-search__grid">
                                <label class="rntx-project-field" for="rntx-project-search">
                                    <span class="rntx-project-field__icon rntx-project-field__icon--goal" aria-hidden="true"></span>
                                    <input
                                        id="rntx-project-search"
                                        class="rntx-project-search__input"
                                        type="search"
                                        placeholder="What are you planning?"
                                        autocomplete="off"
                                    >
                                </label>

                                <label class="rntx-project-field" for="rntx-project-type">
                                    <span class="rntx-project-field__icon rntx-project-field__icon--type" aria-hidden="true"></span>
                                    <select id="rntx-project-type" class="rntx-project-search__select">
                                        <option value="">Project Type</option>
                                        <option value="kitchen">Kitchen Remodeling</option>
                                        <option value="bathroom">Bathroom Remodeling</option>
                                        <option value="flooring">Flooring</option>
                                        <option value="roofing">Roofing</option>
                                        <option value="additions">Home Additions</option>
                                        <option value="painting">Painting</option>
                                    </select>
                                </label>

                                <label class="rntx-project-field" for="rntx-project-zip">
                                    <span class="rntx-project-field__icon rntx-project-field__icon--zip" aria-hidden="true"></span>
                                    <input
                                        id="rntx-project-zip"
                                        class="rntx-project-search__input"
                                        type="text"
                                        inputmode="numeric"
                                        placeholder="Your ZIP Code"
                                        autocomplete="postal-code"
                                    >
                                </label>

                                <button class="rntx-project-search__button" type="submit">
                                    Get Started
                                </button>
                            </div>
                        </form>

                        <div class="rntx-project-trust-row" aria-label="Project benefits">
                            <span>
                                <i class="rntx-project-trust-icon rntx-project-trust-icon--estimate" aria-hidden="true"></i>
                                Free estimates
                            </span>

                            <span>
                                <i class="rntx-project-trust-icon rntx-project-trust-icon--check" aria-hidden="true"></i>
                                No obligation
                            </span>

                            <span>
                                <i class="rntx-project-trust-icon rntx-project-trust-icon--local" aria-hidden="true"></i>
                                Local experts
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="rntx-services" class="rntx-section rntx-section--services" data-rntx-reveal>
            <div class="rntx-shell">
                <div class="rntx-section-head">
                    <div>
                        <h2>Popular Services</h2>
                    </div>

                    <button
                        type="button"
                        data-rntx-modal-title="All services"
                        data-rntx-modal-text="Service browsing will connect to the future CRUD system."
                    >
                        View all
                    </button>
                </div>

                <div class="rntx-service-row rntx-service-row--empty-ready" data-rntx-scroll-row>
                    <?php foreach ($services as $service) : ?>
                        <article class="rntx-service-card rntx-service-card--empty">
                            <div class="rntx-service-card__media rntx-service-card__media--empty" aria-hidden="true">
                                <span class="rntx-service-mini-icon rntx-category-icon rntx-category-icon--<?php echo esc_attr($service['icon']); ?>"></span>
                            </div>

                            <div class="rntx-service-card__body">
                                <h3><?php echo esc_html($service['name']); ?></h3>
                                <p><?php echo esc_html($service['description']); ?></p>

                                <button
                                    type="button"
                                    aria-label="Explore <?php echo esc_attr($service['name']); ?>"
                                    data-rntx-chip="<?php echo esc_attr($service['type']); ?>"
                                >
                                    →
                                </button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="rntx-section rntx-section--contractors" data-rntx-reveal>
            <div class="rntx-shell">
                <div class="rntx-section-head">
                    <div>
                        <p>Trusted Network</p>
                        <h2>Featured Contractors</h2>
                    </div>

                    <button
                        type="button"
                        data-rntx-modal-title="Featured contractors"
                        data-rntx-modal-text="Contractor profiles will connect to hub profiles in the future."
                    >
                        View all
                    </button>
                </div>

                <div class="rntx-contractor-row" data-rntx-scroll-row>
                    <?php foreach ($contractors as $contractor) : ?>
                        <article class="rntx-pro-card">
                            <div class="rntx-pro-card__top">
                                <div class="rntx-pro-avatar" aria-hidden="true">
                                    <?php echo esc_html($contractor['initials']); ?>
                                </div>

                                <div>
                                    <div class="rntx-pro-name-row">
                                        <h3><?php echo esc_html($contractor['name']); ?></h3>

                                        <?php if (!empty($contractor['tag'])) : ?>
                                            <span><?php echo esc_html($contractor['tag']); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <p><?php echo esc_html($contractor['city']); ?></p>
                                </div>

                                <button
                                    class="rntx-save-btn"
                                    type="button"
                                    aria-label="Save contractor"
                                    data-rntx-modal-title="Save contractors"
                                    data-rntx-modal-text="Saved contractors will be available inside your project hub."
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 21.35 10.55 20.03C5.4 15.36 2 12.27 2 8.5 2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.54L12 21.35Z"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="rntx-rating-row">
                                <strong><?php echo esc_html($contractor['rating']); ?></strong>
                                <span aria-label="<?php echo esc_attr($contractor['rating']); ?> star rating">★★★★★</span>
                                <small>(<?php echo esc_html($contractor['reviews']); ?>)</small>
                            </div>

                            <ul>
                                <?php foreach ($contractor['points'] as $point) : ?>
                                    <li><?php echo esc_html($point); ?></li>
                                <?php endforeach; ?>
                            </ul>

                            <button
                                class="rntx-btn rntx-btn--outline"
                                type="button"
                                data-rntx-modal-title="<?php echo esc_attr($contractor['name']); ?>"
                                data-rntx-modal-text="Full contractor profiles will include reviews, services, service areas, portfolio images, and availability."
                            >
                                View Profile
                            </button>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="rntx-section rntx-section--materials" data-rntx-reveal>
            <div class="rntx-shell">
                <div class="rntx-section-head">
                    <div>
                        <p>Explore Materials</p>
                        <h2>Explore Materials</h2>
                    </div>

                    <button
                        type="button"
                        data-rntx-modal-title="Materials"
                        data-rntx-modal-text="Material browsing will connect to material catalogs in the future."
                    >
                        View all
                    </button>
                </div>

                <div class="rntx-material-row" data-rntx-scroll-row>
                    <?php foreach ($materials as $material) : ?>
                        <article class="rntx-material-card rntx-material-card--<?php echo esc_attr($material['slug']); ?>">
                            <div aria-hidden="true"></div>
                            <h3><?php echo esc_html($material['name']); ?></h3>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="rntx-estimate" class="rntx-section rntx-section--estimate" data-rntx-reveal>
            <div class="rntx-shell">
                <div class="rntx-estimate-panel">
                    <div>
                        <p>Quick Estimate</p>
                        <h2>Ready to start your project?</h2>
                        <span>Get a fast, free quote today.</span>
                    </div>

                    <button class="rntx-btn rntx-btn--light" type="button" data-rntx-open-estimate>
                        Save & Continue
                    </button>
                </div>
            </div>
        </section>

        <section class="rntx-section rntx-section--local" data-rntx-reveal>
            <div class="rntx-shell">
                <div class="rntx-local-panel">
                    <p>Local Service Areas</p>
                    <h2>Serving homeowners across North Texas</h2>

                    <div class="rntx-city-cloud">
                        <?php foreach ($cities as $city) : ?>
                            <span><?php echo esc_html($city); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="rntx-sticky-guest-cta" data-rntx-sticky-cta>
            <button type="button" data-rntx-scroll-target="#rntx-services">
                Sign In
            </button>

            <button type="button" data-rntx-open-estimate>
                Get Estimate
            </button>
        </div>

    <?php else : ?>

        <section class="rntx-dashboard" aria-labelledby="rntx-dashboard-title">
            <div class="rntx-shell">
                <div class="rntx-dashboard-hero">
                    <p>Welcome back</p>

                    <h1 id="rntx-dashboard-title">
                        <?php echo esc_html($display_name); ?>, continue your remodel.
                    </h1>

                    <span>Your project hub will help you manage estimates, contractors, materials, invoices, payments, and project progress.</span>
                </div>

                <div class="rntx-dashboard-grid">
                    <article>
                        <p>Active Project</p>
                        <h2>Kitchen Remodel</h2>
                        <span>Estimate pending</span>
                    </article>

                    <article>
                        <p>Progress</p>
                        <h2>62%</h2>
                        <div class="rntx-progress" aria-label="Project progress">
                            <span style="width: 62%;"></span>
                        </div>
                    </article>

                    <article>
                        <p>Saved Pros</p>
                        <h2>3</h2>
                        <span>Ready to compare</span>
                    </article>

                    <article>
                        <p>Material Ideas</p>
                        <h2>12</h2>
                        <span>Saved to your hub</span>
                    </article>
                </div>
            </div>
        </section>

    <?php endif; ?>
</main>

<div class="rntx-modal" data-rntx-modal hidden>
    <div class="rntx-modal__backdrop" data-rntx-close-modal></div>

    <div class="rntx-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="rntx-modal-title">
        <button class="rntx-modal__close" type="button" aria-label="Close modal" data-rntx-close-modal>
            ×
        </button>

        <p data-rntx-modal-kicker>Coming soon</p>
        <h2 id="rntx-modal-title" data-rntx-modal-title>Project tools are coming soon.</h2>
        <span data-rntx-modal-text>
            This feature will connect to the Remodel North Texas project experience.
        </span>

        <div class="rntx-modal__actions">
            <button class="rntx-btn rntx-btn--primary" type="button" data-rntx-close-modal>
                Got it
            </button>
        </div>
    </div>
</div>

<script src="<?php echo esc_url(get_stylesheet_directory_uri() . '/pages/home.js'); ?>?v=<?php echo esc_attr($rntx_home_version); ?>"></script>