<?php
    /**
    This file is part of WideImage.

    WideImage is free software; you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation; either version 2.1 of the License, or
    (at your option) any later version.

    WideImage is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with WideImage; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  **/

    class wioMirror
    {
        /**
         * @param $image
         *
         * @return mixed
         */
        function execute($image)
        {
            $new = $image->copy();

            $width = $image->getWidth();
            $height = $image->getHeight();
            for ($x = 0; $x < $width; $x++)
            {
                imagecopy(
                    $new->getHandle(),
                    $image->getHandle(),
                    $x, 0, $width - $x - 1, 0,
                    1,
                    $height
                );
            }

            return $new;
        }
    }