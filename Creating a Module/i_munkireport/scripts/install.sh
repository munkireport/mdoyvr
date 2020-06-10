#!/bin/bash

# i_munkireport controller
CTL="${BASEURL}index.php?/module/i_munkireport/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/i_munkireport.sh" -o "${MUNKIPATH}preflight.d/i_munkireport.sh"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/i_munkireport.sh"

	# Set preference to include this file in the preflight check
	setreportpref "i_munkireport" "${CACHEPATH}i_munkireport.txt"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/i_munkireport.sh"

	# Signal that we had an error
	ERR=1
fi
