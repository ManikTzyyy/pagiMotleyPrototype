// Sample data for generating cards
const cardData = [
  {
    image: "assets/img/terminalia.webp",
    title: "Terminalia Catappa",
    description:
      "Terminalia catappa is a large tropical tree in the leadwood tree family, Combretacee, native to Asia, Australia, the Pacific, Madagascar and Seychelles. Common names in English include country almond, Indian almond, Malabar almond, sea almond, tropical almond, beach almond and false kamani. <br/ > <br/> In Indonesia it is common call as Ketapang, live near of the sea side. Basically we use Ketapang leaf for make black, grey, and gold color. <br/><br/>",
    colors: ["#080808", "#8B8784", "#A38233"],
  },
  {
    image: "assets/img/biancaea.webp",
    title: "Biancaea Sappan",
    description:
      "Biancaea sappan is a species of flowering tree in the legume family, Fabacee, that is native to tropical Asia. Common names in English include sappanwood and Indian redwood. It was previously ascribed to the genus Caesal-pinia. Sappanwood is related to brazilwood (Paubrasilia echinata), and was itself called brasilwood in the Middle Ages. <br/><br/>This plant has many uses. It has antibacterial and anticoag ulant properties. It also produces a valuable reddish dye called brazilin, used for dyeing fabric as well as making redpaints and inks.<br/><br/>",
    colors: ["#761622", "#C63E4C", "#E87A87"],
  },
  {
    image: "assets/img/strobilanthes.webp",
    title: "Strobilanthes Cusia",
    description:
      "Strobilanthes cusia, also known as Assam indigo or Chinese rain bell, is a perennial flowering plant of the family Acanthaceae. Native to South Asia, China, and Indochina, it was historically cultivated on a large scale in India and China as a source of indigo dye, which is also known as Assam indigo. In addition to being used for dye, it is also used in the traditional Chinese herbal medicine 'Qingdai'. Other names for this dicot include Pink strobilanthes and Strobilanthes flaccidifolius, where flaccidi-folius is Latin for 'drooping leaves'<br/><br/>",
    colors: ["#1A2747", "#30416F", "#7D98DD"],
  },
  {
    image: "assets/img/cocos.webp",
    title: "Cocos Nucifera",
    description:
      "The coconut tree (Cocos nucifera) is a member of the palm tree family (Arecace-ae) and the only living species of the genus Cocos. The term 'foconut' (or the archaic 'cocoanut') can refer to the whole coconut palm, the seed, or the fruit, which botanically is a drupe, not a nut. The name comes from the old Portuguese word coco, meaning 'head' or 'skull' ,after the three indentations on the coconut shell that resemble facial features. They are ubiquitous in coastal tropical regions and are a cultural icon of the tropics.<br/><br/><br/><br/>",
    colors: ["#E2C9CC", "#CC9A9D", "#B4787A"],
  },
  {
    image: "assets/img/mangifera.webp",
    title: "Mangifera Indica",
    description:
      "Mangifera Indica, commonly known as mango, is a species of flowering plant in the family Anacardiacee. It is a large fruit tree, capable of growing to a height of 30 metres (100 feet). There are two distinct genetic populations in modern mangoes - the Indian type and the Southeast Asian type.<br/><br/>It is a large green tree, valued mainly for its fruits, both green and ripe. Approximately 500 varieties have been reported in India. It can grow up to 15-30 metres (50-100 feet) tall with a similar crown width and a trunk circumference of more than 3.7 m (12 ft). The leaves are simple, shiny and dark green.<br/><br/>In natural dye we use the leaves for making yellow color.<br/><br/>",
    colors: ["#EAE379", "#CCA735", "#EA9F10"],
  },
];

// Function to generate a card
function generateCard(data) {
  const cardContainer = document.getElementById("cardContainer");

  const cardHTML = `
      <div class="img-container">
        <img src="${data.image}" alt="${data.title}" />
        <div class="text-wrapper column">
          <div class="colors-row row">
            ${data.colors
              .map(
                (color) =>
                  `<div class="color-container" style="background-color: ${color};"></div>`
              )
              .join("")}
          </div>
          <p>THE BEAUTY OF NATURE</p>
          <h4 style="font-weight: bold">${data.title}</h4>
          <div class="desc-wrapper">
            <p>${data.description}</p>
          </div>
        </div>
      </div>
    `;

  cardContainer.innerHTML += cardHTML;
}

// Loop through the data and generate each card
cardData.forEach(generateCard);
