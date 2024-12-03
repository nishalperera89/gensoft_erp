import React from 'react';

interface ImageProp {
    src: string,
    width: string,
    height: string
}

const Image: React.FC<ImageProp> = ({src, width, height}) => {
    return (
        <img src={src} width={width} height={height} />
    );
};

export default Image;
