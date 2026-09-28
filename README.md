# Oussama Jalleli — Personal CV

Static HTML personal website, deployed to GitHub Pages with GitHub Actions. The site files live in `site/`; no build step or package installation is needed.

## Publish on GitHub Pages

1. Create a GitHub repository. For the cleanest address, name it `oussjalleli.github.io` (otherwise Pages uses a URL containing the repository name).
2. Add this folder's contents to the repository and push them to the `main` branch.
3. In the repository, open **Settings → Pages** and set the build and deployment source to **GitHub Actions**.
4. Open the **Actions** tab and wait for **Deploy personal CV to GitHub Pages** to finish. The workflow summary includes the published URL.

Future pushes to `main` publish the site automatically. You can also run the workflow manually from **Actions**.

## Personalize

- The portrait is `site/image.jpg`; replace it with another portrait using the same filename to update the site image.
- Add your CV PDF as `site/cv.pdf`; the **View CV (PDF)** link opens it in a new tab.
- Edit `site/index.html` to update your CV details, links, and publications.
