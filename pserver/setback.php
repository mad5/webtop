<?php
// https://askubuntu.com/questions/703628/how-to-close-minimize-and-maximize-a-specified-window-from-terminal

exec('wmctrl -a "mypDesktop" ');
exec('wmctrl -r "mypDesktop" -b add,below');
exec('wmctrl -r "mypDesktop" -b add,maximized_vert,maximized_horz');

#exec("/usr/bin/python2 ./toggletitle.py --decorations 0 ACTIVE ");
#exec("/usr/bin/python2 ./toggletitle.py --decorations 0 ACTIVE ");

echo "ok";
?>