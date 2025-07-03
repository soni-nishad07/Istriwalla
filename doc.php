



<!-- -git  -->


# Initialize repository if not already
git init

# Add all files (including hidden ones)
git add -A

# Commit with a message
git commit -m "Initial commit with full project"

# Add remote origin (replace if already exists)
git remote remove origin 2>/dev/null
git remote add origin https://github.com/designerstreet/istriwalla.git

# Rename branch to main
git branch -M main

# Force push to overwrite remote contents with local contents
git push -u origin main --force




