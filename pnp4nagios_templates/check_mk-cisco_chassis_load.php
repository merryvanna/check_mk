<?php
# +------------------------------------------------------------------+
# # |             ____ _               _        __  __ _  __           |
# # |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# # |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# # |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# # |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# # |                                                                  |
# # | Copyright Mathias Kettner 2013             mk@mathias-kettner.de |
# # +------------------------------------------------------------------+
# #
# # This file is part of Check_MK.
# # The official homepage is at http://mathias-kettner.de/check_mk.
# #
# # check_mk is free software;  you can redistribute it and/or modify it
# # under the  terms of the  GNU General Public License  as published by
# # the Free Software Foundation in version 2.  check_mk is  distributed
# # in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# # out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# # PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# # ails.  You should have  received  a copy of the  GNU  General Public
# # License along with GNU Make; see the file  COPYING.  If  not,  write
# # to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# # Boston, MA 02110-1301 USA.
#

$opt[1] = "--vertical-label \"%\" --title \"$NAGIOS_AUTH_SERVICEDESC\" -h 140 ";
$unit = '%%';

$ds_name[1] = "Chassis load";

$def[1] = "DEF:var1=$RRDFILE[1]:$DS[1]:MAX ";
$def[1] .= "DEF:var2=$RRDFILE[2]:$DS[2]:MAX ";
$def[1] .= "LINE2:var1#2080ff:\"In load\:\" ";
$def[1] .= "GPRINT:var1:LAST:\"%2.0lf$unit\" ";
$def[1] .= "GPRINT:var1:MAX:\"(Max\: %2.0lf$unit,\" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"Avg\: %2.0lf$unit)\\n\" ";
$def[1] .= "LINE2:var2#208000:\"Out load\:\" ";
$def[1] .= "GPRINT:var2:LAST:\"%2.0lf$unit\" ";
$def[1] .= "GPRINT:var2:MAX:\"(Max\: %2.0lf$unit,\" ";
$def[1] .= "GPRINT:var2:AVERAGE:\"Avg\: %2.0lf$unit)\\n\" ";
$def[1] .= "TEXTALIGN:left ";
$def[1] .= "HRULE:$WARN[1]#FFFF00:\"Warning\: $WARN[1]%\" ";
$def[1] .= "HRULE:$CRIT[1]#FF0000:\"Critical\: $CRIT[1]%\" ";
?>
