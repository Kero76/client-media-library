<?php
    /**
     * MediaClient.
     * Copyright (C) 2017 Nicolas GILLE
     *
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

    declare(strict_types=1);

    namespace MediaClient\Http;

    use MabeEnum\Enum;

    /**
     * Class HttpCodeStatus who represent the different code HTTP present on Media Library.
     *
     * This is an enumeration who composed by all HTTP code status can return by Media Library.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Http
     * @since 1.0
     * @version 1.0
     */
    class HttpCodeStatus extends Enum {

        const OK = 200;
        const CREATED = 201;
        const NO_CONTENT = 204;
        const NOT_FOUND = 404;
        const CONFLICT = 409;
    }
