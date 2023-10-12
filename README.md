> For the sake of maintainability, readability, scalability and reusability, separation of concerns was maintained throughout the development.

root/

├── index.php

├── assets/

│ └── img/

├── components/

│ ├── productTemplate.php

│ └── sortBy.php

├── css/

│ └── styles.css

├── data/

│ ├── database.php

│ └── product.json

├── filters/

│ └── productSortByFilter.js

└── README.md


> index.php

    - entry point for styles, data and overall structure by including necessary files (SoC).

> assets/img

    - provided images are kept in assets folder for better maintenance.

> components/

    - productTemplate.php - creates the structure for each product element. htmlspecialchars used to prevent HTML injection thus tightening security and preventing XSS.
    - sortBy.php - carries the UI for the sortBy element.

> css/styles.css

    - variables added for better maintenance.
    - relative units used to aid responsiveness.

> data/

    - database.php - connection to database table 'product' is stablished here.
    - product.json - json data kept for reference.

> filters/productFilter.js

    - sortByPrice - product with the lowest price is displayed in ascending order.
    - sortByReview - product with the highest score will be displayed first.
    - sortByName - product sorted in alphabetical order.
    - sortBySaving - product with the highest discount will be displayed first.
    - mobile 'sort by' side panel logic included in file.

---

###Finished Screenshots

> mobile layout

![mobile layout](./assets/screenshots/mobile-layout.PNG) ![mobile sort by layout](./assets/screenshots/mobile-layout-sort-by.PNG)

> desktop layout

![desktop layout](./assets/screenshots/desktop-layout.PNG)

> Lighthouse audit

![Lighthouse audit](./assets/screenshots/audit.PNG)

---

**Responsiveness:** side panel added in mobile view to create a more interactive user experience.
**Accessibility, SEO and Best Pratices:** aria-labels, alt attributes and other best practices were followed to aid these aspects.
