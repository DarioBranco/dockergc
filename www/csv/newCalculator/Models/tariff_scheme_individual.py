from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class tariff_scheme_individual(Base):
	__tablename__ = 'tariff_scheme_individual'
	id = Column(Integer, primary_key=True)
	PriceModelID = Column(Text)
	TariffID = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	StartTime = Column(Text)
	EndTime = Column(Text)
	Period = Column(Text)
	PriceType = Column(Text)
	Unit = Column(Text)
	Price = Column(Text)