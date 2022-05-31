import React, { useEffect, useState } from "react";
import styled from "styled-components";
import { useSpring } from "react-spring"
import Arrow from "./icons/arrow";
import ScrollContainer from 'react-indiana-drag-scroll'



function App({
  config
}) {
  const d_config = JSON.parse(config);
  const [active, setActive] = useState(false);
  const [prices, setPrices] = useState({
    Diesel: "15",
    Essence: "14",
    Aditive: "14.5",
    ville: 0
  });
  const Dh = () => {
    return (
      <i style={{
        fontSize: 8
      }}>dh</i>
    )
  }
  async function getPrices(villeid = 0) {
    const empty = () => setPrices(s => ({
      ...s,
      Diesel: "NaN",
      Essence: "NaN",
      Aditive: "NaN",
    }))
    try {
      var data = await fetch(`${d_config.proxy}${d_config?.api?.base}${d_config?.api?.stations_path}${d_config.cities[villeid]}`, {
        method: 'GET',
        redirect: 'follow',
        headers: {
          "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:100.0) Gecko/20100101 Firefox/100.0",
          "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
          "Accept-Language": "en-US,en;q=0.5",
          "Accept-Encoding": "gzip, deflate, br",
          "DNT": "1",
          "Origin":"total.smarteez.eu",
          "Connection": "keep-alive",
          "Upgrade-Insecure-Requests": "1",
          "Sec-Fetch-Dest": "document",
          "Sec-Fetch-Mode": "navigate",
          "Sec-Fetch-Site": "none",
          "Sec-Fetch-User": "?1"
        },
      });
      if (!data) empty()
      data = await data.json()
      if (!data) empty()
      data = await fetch(`${d_config.proxy}${d_config?.api?.base}${d_config?.api?.prices_path}${data?.stations[0]?.id_station}`, {
        method: 'GET',
        redirect: 'follow',
        headers: {
          "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:100.0) Gecko/20100101 Firefox/100.0",
          "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
          "Accept-Language": "en-US,en;q=0.5",
          "Accept-Encoding": "gzip, deflate, br",
          "DNT": "1",
          "Origin":"total.smarteez.eu",
          "Connection": "keep-alive",
          "Upgrade-Insecure-Requests": "1",
          "Sec-Fetch-Dest": "document",
          "Sec-Fetch-Mode": "navigate",
          "Sec-Fetch-Site": "none",
          "Sec-Fetch-User": "?1"
        }
      });
      if (!data) empty()
      data = await data.json()
      // {
      //   "prix": {
      //     "prix_diesel": "14.69",
      //     "prix_essence": "15.54",
      //     "prix_excelium_sp": "0.00",
      //     "prix_aditive": "15.29"
      //   }
      // }
      if (!data || !data?.prix) empty()
      setPrices(s => ({
        ...s,
        Diesel: data?.prix?.prix_diesel,
        Essence: data?.prix?.prix_essence,
        Aditive: data?.prix?.prix_aditive,
      }))
    } catch (error) {
      empty()
    }
  }
  const styles = useSpring({ transform: `rotateZ(${active ? 0 : 180}deg)` })
  const style0 = useSpring({ transform: `scaleX(${active ? 1 : 0})` })
  useEffect(() => {
    getPrices()
  }, [])
  return (
    <WidgetWrapper >
      <Collapsive w={active ? 1 : 0}>
        <StyledItem>
          <TypeName>
            {Object.keys(prices)[0]}
          </TypeName>
          <Line />
          <Price>
            {prices.Diesel} <Dh />
          </Price>
        </StyledItem>
        <StyledItem>
          <TypeName>
            {Object.keys(prices)[1]}
          </TypeName>
          <Line />
          <Price>
            {prices.Essence}<Dh />
          </Price>
        </StyledItem>
        <StyledItem>
          <TypeName>
            {Object.keys(prices)[2]}
          </TypeName>
          <Line />
          <Price>
            {prices.Aditive}<Dh />
          </Price>
        </StyledItem>
        <Scroller activationDistance={10} className="scroll-container">
          {d_config.cities?.map((s, i) => <Ville key={i} active={prices.ville == i} onClick={() =>{ 
            getPrices(i)
            setPrices(s => ({ ...s, ville: i }))}}>
            {s}
          </Ville>)}
        </Scroller>
      </Collapsive>
      <Btn onClick={() => setActive(s => !s)}>
        <Arrow style={styles} />
      </Btn>
    </WidgetWrapper>
  );
}
const Ville = styled.span`
width: 81px;
height: 23.02px;
cursor: pointer;
font-family: 'SF Compact';
font-style: normal;
font-weight: 556;
font-size: 12px;
line-height: 14px;
display: flex;
align-items: center;
text-align: center;
justify-content: center;
color: ${({ active }) => active ? "#099438" : "#000000"};
transform: scale(1);
:active{
  transform: scale(.95);
}
transition: all ease-in-out 100ms;
/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;
`;
const Scroller = styled(ScrollContainer)`
box-sizing: border-box;
scroll-snap-points-y: repeat(81px);
scroll-snap-type: y mandatory;
scroll-snap-align: start;
scroll-behavior: smooth;
/* Auto layout */
-ms-overflow-style: none;  /* IE and Edge */
scrollbar-width: none;  /* Firefox */
display: flex;
flex-direction: row;
align-items: center;
padding: 0px 2px;
gap: 1px;
isolation: isolate;
width: 100%;
height: 34px;
overflow-x: scroll;

background: #FFFFFF;
border-bottom: 0.2px solid #999797;

/* Inside auto layout */
flex: none;
align-self: stretch;
flex-grow: 0;
`;
const Price = styled.span`
width: 25%;
height: 24px;
font-family: 'SF Compact';
font-style: normal;
font-weight: 556;
font-size: 12px;
line-height: 14px;
display: flex;
align-items: center;
text-align: center;
color: #099438;
/* Inside auto layout */
flex: none;
align-items: center;
justify-content: center;
order: 2;
flex-grow: 0;
`;

const Line = styled.hr`
width: 23.02px;
height: 0px;
margin: 0px 1px;
border: .7px solid #C2C2C2;
transform: rotate(-90deg);
/* Inside auto layout */
background-color: #C2C2C2;
flex: none;
order: 1;
flex-grow: 0;
`;
const TypeName = styled.span`
/* Essence */
/* width: 143px; */
width: 65%;
height: 21px;
align-items: center;
justify-content: center;
font-style: normal;
font-weight: 556;
font-size: 15px;
line-height: 18px;
display: flex;
align-items: center;
text-align: center;
color: #000000;
/* Inside auto layout */
text-align: center;
flex: none;
order: 0;
flex-grow: 0;
`;
const StyledItem = styled.div`
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 2px;
  gap: 0px;
  width: 92%;
  height: 34px;
  background: #FFFFFF;
  border-bottom: 0.2px solid #999797;
  /* Inside auto layout */
  flex: none;
  order: 0;
  align-self: stretch;
  flex-grow: 0;
  padding:0px 4%;
`;
const WidgetWrapper = styled.div`
  @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap');
  font-family: 'Rubik', sans-serif;
  * {
  font-family: 'Rubik', sans-serif;
  user-select: none;
  }
  color: #444;
  filter: drop-shadow(3px 2px 2px rgba(0, 0, 0, 0.1));
  &:active{
    filter: drop-shadow(3px 0px 1px rgba(0, 0, 0, 0.1));
  }
  position: fixed;
  top: 20%;
  width: auto;
  left: 0px;
  display: flex;
  transition: filter ease-in-out 100ms;
  /* width: auto; */
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: flex-start;
  justify-content: flex-start;
  padding: 0px;
`;
const Collapsive = styled.div`
    box-sizing: border-box;
    /* Auto layout */
    padding: 0px !important;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0px 1px;
    width: ${({ w }) => w === 0 ? 0 : 207}px;
    overflow: hidden;
    /* width: auto; */
    height: 135px;
    background: #FFFFFF;
    border-right: 0.2px solid #999797;
    border-radius: 0px 0px 8px 0px;
    /* Inside auto layout */
    transition: all ease-in-out 100ms;
    flex: none;
    order: 0;
    flex-grow: 0;
    /* transform: scaleX(${({ w }) => w}); */
    /* max-width: 227px; */
    height: 135px;
`;
const Btn = styled.button`
    max-width: 53px;
    max-height: 56px;
    min-width: 23px;
    min-height: 26px;
    width: 3.1vw;
    height: 3vw;
    background: #FFFFFF;
    border-radius: 0px 35% 35% 0px;
    outline: none;
    border: none;
    user-select: none;
    padding: 0px;
    cursor: pointer;
    * {
    user-select: none;
    }
    display: flex;
    align-items: center;
    justify-content: center;
    /* transform: rotate(180deg); */
`;

export default App;
