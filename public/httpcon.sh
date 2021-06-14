echo "Press Control-C to stop.";
nice php -q -f http.php -- $@
ERR=$?

if [ $ERR -eq 97 ]
then
   echo "97: PLANNED_PAUSE - wait 2";
   sleep 2;
   exec $0 $@;
fi

echo "unplanned restart: err:" $ERR;
echo "wait for 5 secs";
sleep 5
clear

exec $0 $@