#!/bin/bash

# Remove time_zone script
rm -f "${MUNKIPATH}preflight.d/time_zone.sh"

# Remove time_zone.txt file
rm -f "${MUNKIPATH}preflight.d/cache/time_zone.txt"
