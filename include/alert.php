<style>
body {
  overflow: hidden;
}

.toast {
  position: absolute;
  top: 25px;
  right: 30px;
  border-radius: 12px;
  background: #fff;
  padding: 20px 35px 20px 25px;
  box-shadow: 0 6px 20px -5px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transform: translateX(calc(100% + 30px));
  transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
}

.toast.active {
  transform: translateX(0%);
}

.toast .toast-content {
  display: flex;
  align-items: center;
}

.toast-content .check {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 35px;
  min-width: 35px;
  background-color: hsla(0, 100%, 54%, 0.7);
  color: #fff;
  font-size: 20px;
  border-radius: 50%;
}

.toast-content .message {
  display: flex;
  flex-direction: column;
  margin: 0 20px;
}

.message .text {
  font-size: 16px;
  font-weight: 400;
  color: black;
}

.message .text.text-1 {
  font-weight: 600;
  color: red;
}

.toast .close {
  position: absolute;
  top: 10px;
  right: 15px;
  padding: 5px;
  cursor: pointer;
  opacity: 0.7;
}

.toast .close:hover {
  opacity: 1;
}

.toast .progress {
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3px;
  width: 100%;
}

.toast .progress:before {
  content: "";
  position: absolute;
  bottom: 0;
  right: 0;
  height: 100%;
  width: 100%;
  background-color: red;
}

.progress.active:before {
  animation: progress 5s linear forwards;
}

@keyframes progress {
  100% {
    right: 100%;
  }
}
</style>

<!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
<div class="toast active">
  
  <div class="toast-content">
    <i class="fas fa-solid fa-check check"></i>

    <div class="message">
      <span class="text text-1">Warning</span>
      <span class="text text-2">All Fields Required</span>
    </div>
  </div>
  <i class="fa-solid fa-xmark close"></i>

  <!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
  <div class="progress active"></div>
</div>

<script>
toast = document.querySelector(".toast");
(closeIcon = document.querySelector(".close"));
(progress = document.querySelector(".progress"));

let timer1, timer2;

toast.classList.add("active");
progress.classList.add("active");

timer1 = setTimeout(() => {
    toast.classList.remove("active");
}, 5000); //1s = 1000 milliseconds

timer2 = setTimeout(() => {
    progress.classList.remove("active");
}, 5300);


closeIcon.addEventListener("click", () => {
  toast.classList.remove("active");

  setTimeout(() => {
    progress.classList.remove("active");
  }, 300);

  clearTimeout(timer1);
  clearTimeout(timer2);
});
</script>
