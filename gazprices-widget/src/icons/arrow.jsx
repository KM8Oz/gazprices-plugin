import * as React from "react";
import {animated} from "react-spring";
function Arrow({size=35, ...props}) {
  return (
    <animated.svg
    width={size}
    height={size}
      viewBox="0 0 25 25"
      fill="none"
      {...props}
    >
         <path d="M16.667 5.208v14.584L5.208 12.5l11.459-7.292z" fill="#000" />
    </animated.svg>
  );
}

export default Arrow;