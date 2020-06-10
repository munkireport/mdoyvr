#!/bin/bash

# time_zone controller
CTL="${BASEURL}index.php?/module/time_zone/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/time_zone.sh" -o "${MUNKIPATH}preflight.d/time_zone.sh"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/time_zone.sh"

	# Set preference to include this file in the preflight check
	setreportpref "time_zone" "${CACHEPATH}time_zone.txt"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/time_zone.sh"

	# Signal that we had an error
	ERR=1
fi
