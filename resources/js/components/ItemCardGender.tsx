import React from 'react'
import CardContent from '@mui/material/CardContent'
import Box from '@mui/material/Box'

const getGenderComponent = (numGender: number | string) => {
  if (numGender === 1) {
    return <CardContent sx={{ bgcolor: 'info.light', py: '5px' }} />
  } else if (numGender === 2) {
    return (
      <CardContent sx={{ width: '100%', bgcolor: 'error.light', py: '5px' }} />
    )
  } else {
    return (
      <Box component="div" sx={{ display: 'flex', height: 10 }}>
        <CardContent sx={{ width: '50%', bgcolor: 'info.light', py: '0' }} />
        <CardContent sx={{ width: '50%', bgcolor: 'error.light', py: '0' }} />
      </Box>
    )
  }
}

const ItemCardGender: React.VFC<{ numGender: number | string }> = (props) => {
  return <>{getGenderComponent(props.numGender)}</>
}

export default ItemCardGender
