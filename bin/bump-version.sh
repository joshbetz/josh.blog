#!/bin/sh

BUMP=${1:-patch}

version=$(grep '^Version' style.css | awk '{ print $2 }')
major=$(echo $version | awk -F. '{ print $1 }')
minor=$(echo $version | awk -F. '{ print $2 }')
patch=$(echo $version | awk -F. '{ print $3 }')

version="$major\.$minor\.$patch"

case "$BUMP" in
	'major')
		major=$(($major + 1))
		minor='0'
		patch='0'
		;;

	'minor')
		minor=$(($minor + 1))
		patch='0'
		;;

	'patch' | *)
		patch=$(($patch + 1))
		;;
esac

newVersion="$major.$minor.$patch"

echo $newVersion
sed -i '' -e "s/$version/$newVersion/g" style.css
