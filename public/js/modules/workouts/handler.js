function toggleNotesDetails() {
  const noteDetailSection = document.getElementById("workout-detail-section");

  const sectionStatus = noteDetailSection.dataset.toggleStatus;

  if (sectionStatus == "hidden") {
    noteDetailSection.classList.remove("hidden", "opacity-0", "translate-y-1");
    noteDetailSection.classList.add("flex", "opacity-100", "translate-y-0");

    noteDetailSection.dataset.toggleStatus = "visible";
  } else if (sectionStatus == "visible") {
    noteDetailSection.classList.remove("flex", "opacity-100", "translate-y-0");
    noteDetailSection.classList.add("hidden", "opacity-0", "translate-y-1");

    noteDetailSection.dataset.toggleStatus = "hidden";
  }
}

export default toggleNotesDetails;
