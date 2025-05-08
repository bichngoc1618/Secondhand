
    document.addEventListener('DOMContentLoaded', function () {
      // Get the input element and buttons
      var quantityInput = document.getElementById('quantityInput');
      var incrementButton = document.getElementById('incrementButton');
      var decrementButton = document.getElementById('decrementButton');
  
      // Add click event listeners to the buttons
      incrementButton.addEventListener('click', function () {
        // Increment the quantity by 1 when the plus button is clicked
        updateQuantity(1);
      });
  
      decrementButton.addEventListener('click', function () {
        // Decrement the quantity by 1 when the minus button is clicked, but not below 1
        updateQuantity(-1);
      });
  
      function updateQuantity(change) {
        // Parse the current value to an integer, defaulting to 0 if it's not a valid number
        var currentValue = parseInt(quantityInput.value, 10) || 0;
  
        // Update the quantity with the change value, ensuring it doesn't go below 1
        quantityInput.value = Math.max(1, currentValue + change);
      }
    });
    document.addEventListener('DOMContentLoaded', function () {
      // Lấy tất cả các phần tử trường nhập và nút
      var quantityInputs = document.querySelectorAll('.quantityInput');
      var incrementButtons = document.querySelectorAll('.incrementButton');
      var decrementButtons = document.querySelectorAll('.decrementButton');
    
      // Thêm lắng nghe sự kiện nhấp vào tất cả các nút
      incrementButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
          // Tăng số lượng lên 1 khi nút cộng được nhấp
          updateQuantity(index, 1);
        });
      });
    
      decrementButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
          // Giảm số lượng xuống 1 khi nút trừ được nhấp, nhưng không dưới 1
          updateQuantity(index, -1);
        });
      });
    
      function updateQuantity(index, change) {
        // Phân tích giá trị hiện tại thành một số nguyên, mặc định là 0 nếu nó không phải là một số hợp lệ
        var currentValue = parseInt(quantityInputs[index].value, 10) || 1;
    
        // Cập nhật số lượng với giá trị thay đổi, đảm bảo nó không xuống dưới 1
        quantityInputs[index].value = Math.max(1, currentValue + change);
      }
    });
    