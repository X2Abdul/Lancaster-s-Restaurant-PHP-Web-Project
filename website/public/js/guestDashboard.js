function initializeGuestDashboard() {
  fetchUpcomingServicesForDiner();
  handleBookReservationDialog('guest');
}

function handleConfirmationClose() {
  const bookingConfirmationDialog = document.getElementById(
    "booking-confirmation-dialog"
  );
  bookingConfirmationDialog.setAttribute("aria-hidden", "true");
}
