const testApi =  document.getElementById("test-api");
const API_URL =
    "https://gentle-cove-89517-6b2a668603c5.herokuapp.com";

testApi.addEventListener("click", testApiCall);

async function testApiCall() {
    try {
        const response = await fetch(`${API_URL}/api/hello`);
        const data = await response.json();
        alert(data.message);
    } catch (error) {
        console.error("Erreur lors de l'appel à l'API :", error);
        testApi.textContent = "Erreur lors de l'appel à l'API";
    }
}