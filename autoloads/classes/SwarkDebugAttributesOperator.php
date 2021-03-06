<?php
//
// Swark - extension for eZ Publish
// Author: Jan Kudlicka <jk@seeds.no>
// Copyright (C) 2008 Seeds Consulting AS, http://www.seeds.no/
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of version 2.0 of the GNU General
// Public License as published by the Free Software Foundation.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
// MA 02110-1301, USA.
//

class SwarkDebugAttributesOperator extends SwarkOperator
{
    function __construct()
    {
        parent::__construct( 'debug_attributes', 'header=Debug attributes operator', 'depth=2' );
    }

    static function execute( $operatorValue, $namedParameters )
    {
        include_once( 'lib/eztemplate/classes/eztemplateattributeoperator.php' );

        $header = $namedParameters['header'];
        $depth = $namedParameters['depth'];
        if ( is_integer( $header ) )
        {
            $depth = $header;
            $header = $namedParameters['depth'];
            if ( $header == '2' )
            {
                $header = 'Debug attributes operator';
            }
        }
        $operator = new eZTemplateAttributeOperator();
        $operator->displayVariable( $operatorValue, false, true, $depth, 0, $txt );
        eZDebug::writeNotice( $txt, $header );
    }
}

?>