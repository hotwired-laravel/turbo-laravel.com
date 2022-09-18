#!/usr/bin/bash

for dir in resources/sources/*/ ; do
    version=$(basename $dir)
    echo "Creating symlink for ${version}..."
    ln -sf "${PWD}/resources/sources/${version}/docs" "${PWD}/resources/docs/$version"
done
