document.addEventListener("DOMContentLoaded", () => {
  const sortWrapper = document.getElementById("sortWrapper");

  sortWrapper.addEventListener("click", (e) => {
    if (e.target.classList.contains("sort-by-btn")) {
      const selectedFilter = e.target;
      const buttons = document.querySelectorAll(".sort-by-btn");
      buttons.forEach((btn) => {
        btn.classList.remove("selected");
        // mobile view filter panel
        if (sortWrapper.classList.contains("open-filter-panel")) {
          sortWrapper.classList.remove("open-filter-panel");
        }
      });
      selectedFilter.classList.add("selected");

      switch (selectedFilter.id) {
        case "sortByPrice":
          sortByPrice();
          break;
        case "sortByReview":
          sortByReview();
          break;
        case "sortByName":
          sortByName();
          break;
        case "sortBySaving":
          sortBySaving();
          break;
        default:
          break;
      }
    }
  });

  const productListing = document.getElementById("productListing");
  const productContainers = Array.from(
    productListing.getElementsByClassName("product-container")
  );

  const sortByPrice = () => {
    productContainers.sort((a, b) => {
      const productPriceA = parseFloat(
        a.querySelector("p").innerText.split("£")[1]
      );
      const productPriceB = parseFloat(
        b.querySelector("p").innerText.split("£")[1]
      );
      return productPriceA - productPriceB;
    });
    productListing.innerHTML = "";
    productContainers.forEach((container) =>
      productListing.appendChild(container)
    );
  };

  const sortByReview = () => {
    productContainers.sort((a, b) => {
      const reviewA = parseFloat(
        (
          a.querySelector(".review-score") || { innerText: "0%" }
        ).innerText.split("%")[0]
      );
      const reviewB = parseFloat(
        (
          b.querySelector(".review-score") || { innerText: "0%" }
        ).innerText.split("%")[0]
      );

      if (isNaN(reviewA)) return 1;
      if (isNaN(reviewB)) return -1;

      return reviewB - reviewA;
    });
    productListing.innerHTML = "";
    productContainers.forEach((container) =>
      productListing.appendChild(container)
    );
  };

  const sortByName = () => {
    productContainers.sort((a, b) => {
      const nameA = a.querySelector("h4").innerText.toLowerCase();
      const nameB = b.querySelector("h4").innerText.toLowerCase();
      if (nameA < nameB) return -1;
      if (nameA > nameB) return 1;
      return 0;
    });
    productListing.innerHTML = "";
    productContainers.forEach((container) =>
      productListing.appendChild(container)
    );
  };

  const sortBySaving = () => {
    productContainers.sort((a, b) => {
      const productSavingA = parseFloat(
        (
          a.querySelector(".saving-amount") || { innerText: "£0" }
        ).innerText.split("£")[1]
      );
      const productSavingB = parseFloat(
        (
          b.querySelector(".saving-amount") || { innerText: "£0" }
        ).innerText.split("£")[1]
      );
      return productSavingB - productSavingA;
    });
    productListing.innerHTML = "";
    productContainers.forEach((container) =>
      productListing.appendChild(container)
    );
  };

  // mobile panel functionality
  const handlePanelTriggerClick = () => {
    const sortByWrapper = document.getElementById("sortWrapper");
    sortByWrapper.classList.add("open-filter-panel");
  };

  const sortByPanelTrigger = document.querySelector(".sort-by-panel-trigger");
  sortByPanelTrigger.addEventListener("click", handlePanelTriggerClick);
});
