function imagePreview(input, preview) {
  input.addEventListener("change", (e) => {
    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = (e) => (preview.src = e.target.result);
      reader.readAsDataURL(input.files[0]);
    }
  });
}
