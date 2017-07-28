<?php
    /*
     * This file is part of Media-Client.
     *
     * Media-Client is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * Media-Client is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with Media-Library. If not, see <http://www.gnu.org/licenses/>.
     */
    use Symfony\Component\Debug\ErrorHandler;
    use Symfony\Component\Debug\ExceptionHandler;
    
    // Register global errors and exceptions handler.
    ErrorHandler::register();
    ExceptionHandler::register();
    
    // Registers Twig services providers.
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__ . '/../views/',
    ));
    $app->register(new Silex\Provider\AssetServiceProvider(), array(
       'assets.version' => 'v1',
    ));
    
    // Doctrine service providers.
    $app->register(new Silex\Provider\DoctrineServiceProvider());
    
    // Form service providers.
    $app->register(new Silex\Provider\FormServiceProvider());
    
    // I18N / Globalization services prodivers.
    $app->register(new Silex\Provider\LocaleServiceProvider());
    $app->register(new Silex\Provider\TranslationServiceProvider());
    
    // Extends Twig with some services.
    $app->extend('twig', function($twig, $app) {
        $twig->addExtension(new Twig_Extensions_Extension_Intl());
        
        return $twig;
    });
    
    // Register Restful service providers.
    $app['rest'] = function() {
        return new MediaClient\Rest\RestClient();
    };
