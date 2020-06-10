#!/bin/sh

# Script to collect data
# and put the data into outputfile

CWD=$(dirname $0)
CACHEDIR="$CWD/cache/"
OUTPUT_FILE="${CACHEDIR}time_zone.txt"
SEPARATOR=' = '

# Business logic goes here
# Replace 'echo' in the following lines with the data collection commands for your module.
TIME_ZONE=$(/usr/sbin/systemsetup -gettimezone | awk '{print $NF}')
if [ "$(systemsetup -getusingnetworktime | grep On)" ]; then
	NETWORK_TIME_ENABLED=1
else
	NETWORK_TIME_ENABLED=0
fi
NETWORK_TIME_SERVER=$(cat /etc/ntp.conf | awk '{print $NF", " }' | tr -d '\n')
NETWORK_TIME_SERVER=${NETWORK_TIME_SERVER%?}
AUTO_TIME_ZONE=$(defaults read /Library/Preferences/com.apple.timezone.auto.plist Active)

# Output data here
echo "time_zone${SEPARATOR}${TIME_ZONE}" > ${OUTPUT_FILE}
echo "network_time_server${SEPARATOR}${NETWORK_TIME_SERVER}" >> ${OUTPUT_FILE}
echo "network_time_enabled${SEPARATOR}${NETWORK_TIME_ENABLED}" >> ${OUTPUT_FILE}
echo "auto_time_zone${SEPARATOR}${AUTO_TIME_ZONE}" >> ${OUTPUT_FILE}
