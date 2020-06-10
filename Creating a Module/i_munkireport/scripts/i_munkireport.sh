#!/bin/sh

# Script to collect data
# and put the data into outputfile

CWD=$(dirname $0)
CACHEDIR="$CWD/cache/"
OUTPUT_FILE="${CACHEDIR}i_munkireport.txt"
SEPARATOR=' = '

# Business logic goes here
# Replace 'echo' in the following lines with the data collection commands for your module.
FIELD_1=$(echo)
FIELD_2=$(echo)
FIELD_3=$(echo)

# Output data here
echo "field_1${SEPARATOR}${FIELD_1}" > ${OUTPUT_FILE}
echo "field_2${SEPARATOR}${FIELD_2}" >> ${OUTPUT_FILE}
echo "field_3${SEPARATOR}${FIELD_3}" >> ${OUTPUT_FILE}
